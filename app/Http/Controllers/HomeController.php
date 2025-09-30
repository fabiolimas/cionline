<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Correspondencia;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {



        if(Auth::user()->role == 'loja'){
            $funcionario=$request->funcionario;
             $enviadas=Correspondencia::where('loja_origem', Auth::user()->loja_id)
             ->where('funcionario_origem', $request->funcionario)
             ->count();
        $recebidas=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
        ->where('funcionario_destinatario', $request->funcionario)
        ->where('status','recebido')->count();
         $pendente=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
         ->where('funcionario_destinatario', $request->funcionario)
        ->where('status','aberto')->count();
        $ultimosEnvios=Correspondencia::where('loja_origem', Auth::user()->loja_id)
        ->where('funcionario_origem', $request->funcionario)
        ->limit(4)
        ->orderBy('created_at','desc')
        ->get();

        $correspondencias=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
        ->where('funcionario_destinatario', $request->funcionario)
        ->where('status','aberto')
        ->orderBy('created_at','desc')
        ->get();

        return view('home', compact('enviadas', 'recebidas','pendente','ultimosEnvios', 'correspondencias','funcionario'));

        }else{

             $enviadas=Correspondencia::all()->count();
        $recebidas=Correspondencia::where('status','recebido')->count();
         $pendente=Correspondencia::where('status','aberto')->count();
         $ultimosEnvios=Correspondencia::limit(4)
         ->orderBy('created_at','desc')
        ->get();

          $correspondencias=Correspondencia::where('status','aberto')
          ->orderBy('created_at','desc')
          ->get();

        }


        return view('home', compact('enviadas', 'recebidas','pendente','ultimosEnvios', 'correspondencias'));
    }

    public function funcionario(){


       if(Auth::user()->loja_id == null){

        return redirect()->route('home');

       }else{

          $funcionarios=Funcionario::where('loja_id', Auth::user()->loja_id)->get();


        return view('welcome', compact('funcionarios'));

       }


    }
}
