<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Correspondencia;
use App\Mail\CorrespondenciaMail;
use App\Models\CorrespondenciaIten;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

    use Barryvdh\DomPDF\Facade\Pdf;



class CorrespondenciaController extends Controller
{
   public function index(Request $request){

    if(Auth::user()->role == 'admin'){
        $correspondencias=Correspondencia::all();

    }else{
        $funcionario=$request->funcionario;
        $correspondencias=Correspondencia::where('loja_origem', Auth::user()->loja_id)
        ->where('funcionario_origem', $funcionario)
        ->get();
        return view('painel.correspondencia.index',compact('correspondencias', 'funcionario'));
    }


    return view('painel.correspondencia.index',compact('correspondencias'));
   }

   public function recebidos(Request $request){

    if(Auth::user()->role == 'loja'){
    $funcionario=$request->funcionario;
    $correspondencias=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)

    ->where('funcionario_origem', $funcionario)
    ->get();

    }else{

        $correspondencias=Correspondencia::where('status', 'recebido')

        ->get();

    }





    return view('painel.correspondencia.recebido', compact('correspondencias', 'funcionario'));
   }

    public function enviados(Request $request){
        $funcionario=$request->funcionario;
    $correspondencias=Correspondencia::where('loja_origem', Auth::user()->loja_id)
        ->where('funcionario_origem', $funcionario)
    ->get();




    return view('painel.correspondencia.enviado', compact('correspondencias', 'funcionario'));
   }

   public function porLoja($lojaId)
{
    $funcionarios = Funcionario::where('loja_id', $lojaId)
    ->where('status','ativo')->get();
    return response()->json($funcionarios);
}

   public function create(Request $request){




    $loja=Loja::find(Auth::user()->loja_id);
     $lojas=Loja::where('status', 'ativo')
     ->where('id','!=',$loja->id)->get();
    $funcionarios=Funcionario::where('status','ativo')
    ->where('loja_id', $loja->id)
    ->get();



    return view('painel.correspondencia.create', compact('lojas', 'funcionarios','loja'));

   }

   public function store(Request $request){

    $de =Funcionario::find($request->de);
    $para =Funcionario::find($request->para);



    $ci=new Correspondencia();

    $ci->loja_id=Auth::user()->loja_id;
    $ci->loja_origem=$request->origem;
    $ci->loja_destinatario=$request->destino;
    $ci->funcionario_origem=$de->nome;
    $ci->funcionario_destinatario=$para->nome;
    $ci->data_envio=now();
    $ci->status='aberto';

    $ci->save();


    if($ci->save()){


        foreach($request->itens as $item){

             $ciItens= new CorrespondenciaIten();

            $ciItens->descricao= $item;
            $ciItens->correspondencia_id=$ci->id;

            $ciItens->save();
        }

          // Envia o e-mail para o destinatário
        if (!empty($para->email)) {
            Mail::to($para->email)->send(new CorrespondenciaMail($ci));
        }


    }


    return redirect()->route('home')->with('success', 'CI Cadastrada com sucesso');
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
    $funcionario=$ci->funcionario_origem;

    $ciItens=CorrespondenciaIten::where('correspondencia_id', $ci->id)->get();

    return view('painel.correspondencia.show', compact('ci', 'ciItens','funcionario'));
   }

   public function updateStatus($id){


    $ci=Correspondencia::find($id);

    $ci->update(['status'=>'recebido', 'data_recebimento'=>now()]);

    return redirect()->route('correspondencias')->with('success','Recebimento confirmado');
   }

   public function delete($id){

    $ci=Correspondencia::find($id);
    $ci->delete();

    return redirect()->route('correspondencias')->with('success','Corrspondência excluida com sucesso');
   }

   public function deleteItem($id){
    $citem=CorrespondenciaIten::find($id)->delete();
    return redirect()->back()->with('success','Item excluido');
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
        return redirect()->back()->with('success','Correspondencia editada com sucesso');



   }

public function imprimir($id)
{
     ini_set('max_execution_time', 300); // 5 minutos
    ini_set('memory_limit', '512M'); // aumenta memória
    // Busca o registro no banco
    $ci = Correspondencia::findOrFail($id);
    $ciItens=CorrespondenciaIten::where('correspondencia_id', $ci->id)->get();

    // Passa os dados para a view
    $pdf = Pdf::loadView('painel.correspondencia.imprimir', ['ci' => $ci, 'ciItens'=>$ciItens
    ]);



    // Gera o download
    return $pdf->stream('correspondencia_'.$id.'.pdf');
}
}
