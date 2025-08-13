<?php

use App\Http\Controllers\CorrespondenciaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Correspondencias
Route::get('/correspondencias',[CorrespondenciaController::class, 'index'])->name('correspondencias');
Route::get('/correspondencia',[CorrespondenciaController::class, 'create'])->name('correspondencia');
Route::post('/correspondencia',[CorrespondenciaController::class, 'store'])->name('store-correspondencia');
Route::get('/funcionarios-por-loja/{lojaId}', [CorrespondenciaController::class, 'porLoja'])->name('funcionarios.porLoja');
Route::get('/ci/{id}', [CorrespondenciaController::class, 'show'])->name('ci');
Route::get('/correspondencias/recebidas', [CorrespondenciaController::class, 'recebidos'])->name('ci-recebido');

Route::get('/correspondencias/enviadas', [CorrespondenciaController::class, 'enviados'])->name('ci-enviado');

Route::get('confirma/{id}',[CorrespondenciaController::class, 'updateStatus'])->name('confirma');
Route::get('delete/{id}',[CorrespondenciaController::class, 'delete'])->name('delete');
Route::get('deleteItem/{id}',[CorrespondenciaController::class, 'deleteItem'])->name('delete-item');
Route::get('edit/{id}',[CorrespondenciaController::class, 'edit'])->name('editar-ci');
Route::put('updateCi/{id}',[CorrespondenciaController::class, 'updateCI'])->name('update-ci');


// Loja
Route::prefix('loja')->group(function(){
Route::get('/lojas',[LojaController::class, 'index'])->name('loja.lojas');
Route::get('/loja',[LojaController::class, 'create'])->name('loja');
Route::post('/loja',[LojaController::class, 'store'])->name('store-loja');
Route::get('/edit/{id}',[LojaController::class, 'edit'])->name('edit-loja');
Route::put('/edit/{id}',[LojaController::class, 'update'])->name('update-loja');
});


// Usuário
Route::prefix('usuario')->group(function(){
Route::get('/usuarios',[UserController::class, 'index'])->name('usuario.usuarios');
Route::get('/usuario',[UserController::class, 'create'])->name('usuario');
Route::post('/usuario',[UserController::class, 'store'])->name('store-usuario');
Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit-usuario');
Route::put('/edit/{id}',[UserController::class, 'update'])->name('update-usuario');
});

// Funcionario
Route::prefix('funcionario')->group(function(){
Route::get('/funcionarios',[FuncionarioController::class, 'index'])->name('funcionario.funcionarios');
Route::get('/funcionario',[FuncionarioController::class, 'create'])->name('funcionario');
Route::post('/funcionario',[FuncionarioController::class, 'store'])->name('store-funcionario');
Route::get('/edit/{id}',[FuncionarioController::class, 'edit'])->name('edit-funcionario');
Route::put('/edit/{id}',[FuncionarioController::class, 'update'])->name('update-funcionario');
Route::get('/delteFuncionario/{id}',[FuncionarioController::class, 'delteFuncionario'])->name('delete-funcionario');

});

// Relatórios
Route::prefix('relatorio')->group(function(){
Route::get('/envios-por-loja',[RelatoriosController::class, 'enviosPorLoja'])->name('relatorio.envios-por-loja');
Route::get('/envios-por-item',[RelatoriosController::class, 'enviosPorItem'])->name('envios-por-item');
Route::get('buscaPorLoja/{id}',[RelatoriosController::class, 'buscaCi'])->name('busca.envios-por-loja');
Route::get('buscaPorItem',[RelatoriosController::class, 'buscaItem'])->name('busca-por-item');

});


