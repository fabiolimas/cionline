<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Correspondencia;
use App\Models\CorrespondenciaIten;
use Illuminate\Support\Facades\Auth;

class CorrespondenciaController extends Controller
{
   public function index(){

    if(Auth::user()->role == 'admin'){
        $correspondencias=Correspondencia::all();

    }else{

        $correspondencias=Correspondencia::where('loja_origem', Auth::user()->loja_id)
        ->orWhere('loja_destinatario', Auth::user()->loja_id)->get();
    }


    return view('painel.correspondencia.index',compact('correspondencias'));
   }

   public function recebidos(){

    $correspondencias=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)

    ->get();




    return view('painel.correspondencia.recebido', compact('correspondencias'));
   }

    public function enviados(){

    $correspondencias=Correspondencia::where('loja_origem', Auth::user()->loja_id)

    ->get();




    return view('painel.correspondencia.enviado', compact('correspondencias'));
   }

   public function porLoja($lojaId)
{
    $funcionarios = Funcionario::where('loja_id', $lojaId)
    ->where('status','ativo')->get();
    return response()->json($funcionarios);
}

   public function create(Request $request){

    $lojas=Loja::all();
    $funcionarios=Funcionario::where('status','ativo')
    ->where('loja_id', $request->origem)
    ->get();



    return view('painel.correspondencia.create', compact('lojas', 'funcionarios'));

   }

   public function store(Request $request){

    $de =Funcionario::find($request->de);
    $para =Funcionario::find($request->para);



    $ci=new Correspondencia();

    $ci->loja_id=Auth::user()->id;
    $ci->loja_origem=$request->origem;
    $ci->loja_destinatario=$request->destino;
    $ci->funcionario_origem=$de->nome;
    $ci->funcionario_destinatario=$para->nome;
    $ci->data_envio=date('Y-m-d');
    $ci->status='aberto';

    $ci->save();


    if($ci->save()){

        foreach($request->itens as $item){

    $ciItens= new CorrespondenciaIten();

            $ciItens->descricao= $item;
            $ciItens->correspondencia_id=$ci->id;

            $ciItens->save();
        }


    }


    return redirect()->route('correspondencias')->with('success', 'CI Cadastrada com sucesso');
   }

   public function edit($id){
    $ci=Correspondencia::find($id);
    $lojad=Loja::find($ci->loja_destinatario);
    $lojao=Loja::find($ci->loja_origem);
    $lojas=Loja::all();
    $de=Funcionario::where('nome','like','%'.$ci->funcionario_origem.'%')->first();
    $para=Funcionario::where('nome','like','%'.$ci->funcionario_destinatario.'%')->first();
    $ciItens=CorrespondenciaIten::where('correspondencia_id', $ci->id)->get();



    return view('painel.correspondencia.edit', compact('ci','lojad','lojao','lojas','ciItens','de','para'));
   }

   public function show($id){

    $ci=Correspondencia::find($id);

    $ciItens=CorrespondenciaIten::where('correspondencia_id', $ci->id)->get();

    return view('painel.correspondencia.show', compact('ci', 'ciItens'));
   }

   public function updateStatus($id){


    $ci=Correspondencia::find($id);

    $ci->update(['status'=>'recebido', 'data_recebimento'=>date('Y-m-d')]);

    return redirect()->route('correspondencias')->withsuccess('Recebimento confirmado');
   }

   public function delete($id){

    $ci=Correspondencia::find($id);
    $ci->delete();

    return redirect()->route('correspondencias')->withsuccess('Corrspondência excluida com sucesso');
   }

   public function deleteItem($id){
    $citem=CorrespondenciaIten::find($id)->delete();
    return redirect()->back()->withsuccess('Item excluido');
   }

   public function updateCI(Request $request, $id){

        $ci=Correspondencia::find($id);

        $de =Funcionario::find($request->funcionario_origem);
    $para =Funcionario::find($request->funcionario_destinatario);

        $ci->update([
            'loja_destinatario'=>$request->loja_destinatario,
            'funcionario_origem'=>$de->nome,
            'funcionario_destinatario'=>$para->nome,

    ]);

        foreach($request->itens as $item){

            $ciItem=new CorrespondenciaIten();

            $confere=CorrespondenciaIten::where('correspondencia_id', $id)
            ->where('descricao','like', '%'.$item.'%')->first();

            if($confere){

            }else{
             $ciItem->descricao=$item;
            $ciItem->correspondencia_id=$id;
            $ciItem->save();
            }




        }
        return redirect()->back()->withsuccess('Correspondencia editada com sucesso');



   }
}
