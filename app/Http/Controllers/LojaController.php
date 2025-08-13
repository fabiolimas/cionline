<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
   public function index(){

    $lojas=Loja::all();




    return view('painel.loja.index',compact('lojas'));
   }

   public function create(){



    return view('painel.loja.create');
   }

   public function store(Request $request){

    $loja = new Loja();



    $loja->nome = $request->nome;
    $loja->endereco = $request->endereco;
    $loja->bairro = $request->bairro;
    $loja->cidade = $request->cidade;
    $loja->telefone = $request->telefone;

    $loja->save();




    return redirect()->route('lojas')->with('success', 'Loja cadastrada com sucesso');
   }

   public function edit($id){

    $loja=Loja::find($id);




    return view('painel.loja.edit', compact('loja'));


   }

   public function update(Request $request, $id){

        $loja=Loja::find($id);


        $loja->update($request->all());

        return redirect()->route('loja.lojas')->with('success','Loja Editada com sucesso!');

   }
}
