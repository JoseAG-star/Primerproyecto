<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipalController;


Route::get('/hello', HomeController::class);
Route::get('post/mensaje', [PostController::class,
'Mensaje']); //Llamo a mi controlador y mi metodo
Route::get('post/about/{param?}/{name?}',[PostController::class,'About']);

/*Route::get('/', function () {
    return view('welcome');
});*/
