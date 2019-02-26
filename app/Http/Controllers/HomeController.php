<?php

namespace App\Http\Controllers;

use App\Profile;

use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function añadir(Request $request)
    {

      try{
        $perfil = new Profile;
        $perfil->user_id = $request->input("id");
        $perfil->bio = $request->input("bio");
        $perfil->company = $request->input("company");
        $perfil->technologies = $request->input("technologies");
        $user = User::find($request->input("user"));
        $user->profile()->save($perfil);
        $msg = "Todo correcto";
      }catch(Exception $e){
        $msg = $e->getMessage();
      }

      return view('añadir', array( 'msg'=>$msg ));
    }

    public function borrar(Request $request)
    {

      try{
        $usuario = User::find($request->input('id'));
        $usuario->delete();
        $msg = "Perfil borrado";
      }catch(Exception $e){
        $msg = $e->getMessage();
      }

      return view('borrar', array( 'msg'=>$msg ));
    }


    public function postPerfil2user(Request $request)
    {

      $usuario = User::find($request->input('id'));
      $usuario ? $perfil = $usuario->profile : $perfil = false;

      if($perfil) {
        return view('mostrar', array( 'perfil'=>$perfil ));
      } else {
        $msg = "Ese usuario (".$request->input('id').") no tiene perfil o no existe";
        return view('mostrar', array( 'msg' => $msg));
      }

    }

    public function postUser2profile(Request $request)
    {

      $perfil = Profile::find($request->input('id'));
      $perfil ? $user = $perfil->user : $user = false;

      if($user) {
        return view('mostrar', array( 'user'=>$user ));
      } else {
        $msg = "Ese usuario (".$request->input('id').") no tiene perfil o no existe";
        return view('mostrar', array( 'msg' => $msg));
      }

    }

}
