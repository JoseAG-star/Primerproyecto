<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model{
    protected $table = 'paginas';
    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }

    public function BuscarId($id){
        $registro=Pagina::find($id);
        return $registro;
    }

    protected function casts():array{
        return[
            'created_at'=>'datetime:d-m-Y',
            'is_active'=>'boolean'
        ];
    }

    protected function name():Attribute{
        return Attribute::make(
            set: function($value){
                return strtolower($value);
            },
            get: function($value){
                return ucfirst($value);
            }

        );
    }
}