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
        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa',$datos);
    }

    public function update (Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();
            
    } return $respuesta;
    }
   // Función para la Eliminación Lógica (Soft Delete / Desactivar)
    public function desactivar($id)
    {
        // Buscamos al usuario por su ID
        $usuario = \App\Models\Pagina::find($id);
        
        if ($usuario) {
            // Cambiamos el estatus a 0 (falso/inactivo)
            $usuario->is_active = 0; 
            $usuario->save(); // Guardamos los cambios
            
            // Le respondemos al AJAX que todo fue un éxito
            return response()->json(['mensaje' => 'Usuario desactivado correctamente']);
        }

        // Si no lo encuentra, manda un error
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }

    // Función para la Eliminación Física (Hard Delete / Borrar)
    public function eliminar($id)
    {
        // Buscamos al usuario por su ID
        $usuario = \App\Models\Pagina::find($id);
        
        if ($usuario) {
            // Lo borramos permanentemente de la base de datos
            $usuario->delete(); 
            
            // Le respondemos al AJAX que todo fue un éxito
            return response()->json(['mensaje' => 'Usuario eliminado correctamente']);
        }

        // Si no lo encuentra, manda un error
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }
}
