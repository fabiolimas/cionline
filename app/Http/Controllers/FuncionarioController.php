<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(){

    $funcionarios=Funcionario::all();


    return view('painel.funcionario.index',compact('funcionarios'));
   }

   public function create(){



    return view('painel.funcionario.create');
   }

   public function store(Request $request){

    $funcionario = new Funcionario();



    $funcionario->nome = $request->nome;
    $funcionario->loja_id = $request->loja_id;
    $funcionario->status = 'ativo';



    $funcionario->save();




    return redirect()->route('funcionarios')->with('success, Funcionario cadastrado com sucesso');
   }

   public function edit($id){

    $funcionario=Funcionario::find($id);

    $lojas=Loja::all();


    return view('painel.funcionario.edit', compact('funcionario','lojas'));


   }

   public function update(Request $request, $id){

        $funcionario=Funcionario::find($id);


        $funcionario->update($request->all());

        return redirect()->route('funcionario.funcionarios')->withsuccess('funcionario Editado com sucesso!');

   }
}
