<?php

namespace App\Http\Controllers;

use App\Models\Correspondencia;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatoriosController extends Controller
{
  public function enviosPorLoja(Request $request){
    $lojas=Loja::all();
    $funcionario=$request->funcionario;






    return view ('painel.relatorios.enviosPorLoja', compact('lojas','funcionario'));
  }

  public function buscaCi(Request $request, $id){


  if(Auth::user()->role == 'admin'){
    $correspondencias=Correspondencia::where('loja_origem', $id)

->get();
return view('painel.buscas.buscaPorLoja', compact('correspondencias'));
  }else{
    $funcionario=$request->funcionario;

$correspondencias=Correspondencia::where('loja_origem', $id)
->where('funcionario_destinatario', $funcionario )

->get();



return view('painel.buscas.buscaPorLoja', compact('correspondencias','funcionario'));
  }




  }


   public function enviosPorItem(Request $request){

   $funcionario=$request->funcionario;


    return view ('painel.relatorios.enviosPorItem', compact('funcionario'));
  }

  public function pedidosAbertos(Request $request){

 $lojas=Loja::all();

    return view ('painel.relatorios.pendentePorLoja', compact('lojas'));
  }


  public function buscaItem(Request $request){

if(Auth::user()->role == 'admin'){

$correspondencias=Correspondencia::join('correspondencia_itens','correspondencia_itens.correspondencia_id','correspondencias.id')
->select('correspondencias.*','correspondencia_itens.descricao')

->Where('correspondencia_itens.descricao','like','%'.$request->busca.'%')
->get();
return view('painel.buscas.buscaPorItem', compact('correspondencias'));
}else{

$funcionario=$request->funcionario;
$correspondencias=Correspondencia::join('correspondencia_itens','correspondencia_itens.correspondencia_id','correspondencias.id')
->select('correspondencias.*','correspondencia_itens.descricao')
->where('correspondencias.funcionario_destinatario', $funcionario)
->Where('correspondencia_itens.descricao','like','%'.$request->busca.'%')

->get();




return view('painel.buscas.buscaPorItem', compact('correspondencias','funcionario'));


}


  }



 public function pendenciaPorLoja(Request $request, $id){



$correspondencias=Correspondencia::where('loja_destinatario', $id)
->where('status', 'aberto')

->get();


return view('painel.buscas.pendenciaPorLoja', compact('correspondencias'));
  }


}
