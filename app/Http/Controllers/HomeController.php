<?php

namespace App\Http\Controllers;

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
    public function index()
    {

        if(Auth::user()->role == 'loja'){
             $enviadas=Correspondencia::where('loja_origem', Auth::user()->loja_id)->count();
        $recebidas=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
        ->where('status','recebido')->count();
         $pendente=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
        ->where('status','aberto')->count();
        $ultimosEnvios=Correspondencia::where('loja_origem', Auth::user()->loja_id)
        ->limit(5)
        ->get();

        $correspondencias=Correspondencia::where('loja_destinatario', Auth::user()->loja_id)
        ->where('status','aberto')->get();

        }else{

             $enviadas=Correspondencia::all()->count();
        $recebidas=Correspondencia::where('status','recebido')->count();
         $pendente=Correspondencia::where('status','aberto')->count();
         $ultimosEnvios=Correspondencia::limit(5)
        ->get();

          $correspondencias=Correspondencia::where('status','aberto')->get();

        }







        return view('home', compact('enviadas', 'recebidas','pendente','ultimosEnvios', 'correspondencias'));
    }
}
