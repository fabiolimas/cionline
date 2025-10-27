<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use App\Models\Correspondencia;

class RelatoriosController extends Controller
{
  public function enviosPorLoja(Request $request){
    $lojas=Loja::all();





    return view ('painel.relatorios.enviosPorLoja', compact('lojas'));
  }

  public function buscaCi(Request $request, $id){



$correspondencias=Correspondencia::where('loja_origem', $id)

->paginate(20);

return view('painel.buscas.buscaPorLoja', compact('correspondencias'));
  }


   public function enviosPorItem(Request $request){


    return view ('painel.relatorios.enviosPorItem');
  }

  public function pedidosAbertos(Request $request){

 $lojas=Loja::all();
    return view ('painel.relatorios.pendentePorLoja', compact('lojas'));
  }


  public function buscaItem(Request $request){



$correspondencias=Correspondencia::join('correspondencia_itens','correspondencia_itens.correspondencia_id','correspondencias.id')
->select('correspondencias.*','correspondencia_itens.descricao')

->Where('correspondencia_itens.descricao','like','%'.$request->busca.'%')
->get();

return view('painel.buscas.buscaPorItem', compact('correspondencias'));
  }



 public function pendenciaPorLoja(Request $request, $id){



$correspondencias=Correspondencia::where('loja_destinatario', $id)
->where('status', 'aberto')

->paginate(15);

return view('painel.buscas.pendenciaPorLoja', compact('correspondencias'));
  }


}
