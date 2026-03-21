<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipalController;
use App\Models\Pagina;


Route::get('/hello', HomeController::class);
Route::get('post/mensaje', [PostController::class,
'Mensaje']); //Llamo a mi controlador y mi metodo
Route::get('post/about/{param?}/{name?}',[PostController::class,'About']);

Route::get('/empresa',[HomeController::class,'empresa'])->name('empresa');

Route::get('/contact',function(){
    $nombre="Jose Eduardo Ac Garcia";
    return view('contact',['nombre'=>$nombre,'carrera'=>'Ingenieria en Informatica']);
})->name('contact');

Route::get('/', function(){
    return view('welcome');
})->name('vista_inicio');

Route::get('nuevoregistro', function(){
    $pagina=new Pagina;
    $pagina->name='Jose Eduardo Ac Garcia';
    $pagina->email='joseeduardoacgarcia@example.com';
    $pagina->email_verified_at=date('Y-m.d');
    $pagina->password='12345';
    $pagina->avatar='user.png';
    $pagina->telefono='1234567890';
    $pagina->calle='Calle Falsa 123';
    $pagina->save();
    return $pagina;
});

Route::get('buscarpaginaid', function(){
    $post=Pagina::find(3);
    return $post;
});

Route::get('buscarxname', function(){
    $post=Pagina::where('name','Jose Eduardo Ac Garcia')->first();
    return $post;
});

Route::get('obtenertodos', function(){
    $post=Pagina::all();
    return $post;
});

Route::get('updatename', function(){
    $post=Pagina::where('name','Jose Eduardo Ac Garcia')->first();
    $post->email='Joseeduardoacgarcia@example.com';
    $post->save();
    return $post;
});

Route::get('filter', function(){
    $post=Pagina::where('name','like','%Jose%')->get();
    return $post;
});

Route::get('trescampos', function(){
    $post=Pagina::select('name','email','telefono')->get();
    return $post;
});

Route::get('filtroxnumreg', function(){
    $post=Pagina::select('name','email')->orderBy('name')->take(2)->get();
    return $post;
});

Route::get('eliminar_registro', function(){
    $post=Pagina::find(2);
    $post->delete();
    return "Registro eliminado";
});

Route::get('obtenerfechaformato', function(){
    $post=Pagina::select("name", "email", "created_at")->find(3);
    //return $post->created_at->format('d-m-Y');
    return $post;
});

Route::get('Obtenerestatus', function(){
    $post=Pagina::select("name", "email", "created_at")->find(3);
    if($post->created_at->isToday()){
        return "El registro fue creado hoy";
    }else{
        return "El registro no fue creado hoy";
    }
});

Route::put('/actualizar-dato/{id}', [HomeController::class, 'update'])->name('dato.update');
// Ruta para Eliminación Lógica (Cambiar is_active a false/0)
Route::patch('/desactivar-usuario/{id}', [HomeController::class, 'desactivar'])->name('usuario.desactivar');

// Ruta para Eliminación Física (Borrar el registro por completo)
Route::delete('/eliminar-usuario/{id}', [HomeController::class, 'eliminar'])->name('usuario.eliminar');
/*Route::get('/', function () {
    return view('welcome');
});*/
