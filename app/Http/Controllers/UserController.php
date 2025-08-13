<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){

    $usuarios=User::all();


    return view('painel.usuario.index',compact('usuarios'));
   }

   public function create(){

    $lojas=Loja::all();



    return view('painel.usuario.create', compact('lojas'));
   }

   public function store(Request $request){

    $usuario = new User();



    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->password);
    $usuario->role = $request->role;


    $usuario->save();




    return redirect()->route('usuario.usuarios')->with('success, Usuário cadastrado com sucesso');
   }

   public function edit($id){

    $usuario=User::find($id);
    $loja=Loja::find($usuario->loja_id);
    $lojas=Loja::all();


    return view('painel.usuario.edit', compact('usuario','loja','lojas'));


   }

   public function update(Request $request, $id){

        $usuario=User::find($id);


        $usuario->update($request->all());

        return redirect()->route('usuario.usuarios')->withsuccess('Usuário Editado com sucesso!');

   }

     public function delteUsuario($id){

    $usuario=User::find($id)->delete();


    return redirect()->back()->withsuccess('usuário excluido com sucesso');
   }
}
