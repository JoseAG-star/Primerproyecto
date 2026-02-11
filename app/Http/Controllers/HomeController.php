<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use Iluminate\Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('hello');
    }

    public function empresa(){
        $datos["nombre"]="Jose Eduardo Ac Garcia";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes.";
        $datos["texto_ejemplo"]="Aqui va la descripcion del texto de ejemplo";
        //$usuarios=new Pagina();
        //$datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa',$datos);
    }
}
