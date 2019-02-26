<?php
use App\Profile;

use App\User;

use App\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/añadir', function () {
    return view('añadir');
});

Route::post('/añadir', 'HomeController@añadir');


//Borrar
Route::get('/borrar', function(){
  return view('borrar');
});

Route::post('/borrar', 'HomeController@borrar');

//Perfil de usuario
Route::get('/perfiluser', function(){
  return view('mostrar');
});

Route::post('/perfiluser', 'HomeController@postPerfil2user');

//Usuario de perfil
Route::get('/userperfil', function(){
  return view('mostrar2');
});

Route::post('/userperfil', 'HomeController@postUser2profile');


//Rutas de 1 a N
Route::get('/mostrar/{id}', function($id){
  $articulos = App\User::find($id)->articles;
  return view('articulos', array('articulos'=>$articulos, 'id'=>$id));
});

Route::get('/mostrar2/{id}', function($id){
  $user = App\Article::find($id)->user;
  return view('articulos2', array('user'=>$user, 'id'=>$id));
});

Route::get('/delete/{id}',function($id){

    $user_id = Article::find($id)->user_id;
    Article::where('id',$id)->delete();

    return redirect ('/mostrar/'.$user_id);
});


//Ruta N a M
Route::get('/show/{id}', function($id){
  //Devolverá el artículo con todas sus tags dependiendo del id del artículo
  $articlesConTags = Article::with('tags')->find($id);
  return $articlesConTags;
});
