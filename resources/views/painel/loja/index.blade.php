@extends('layouts.dash')

@section('head')
<link href="{{asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-store"></i> Lojas</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row mb-2">
                        <div class="col-xl-12 col-lg-11">
                        <a href="{{route('loja')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Novo Cadastro</a>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                                <div class="col-xl-12 col-lg-11">
                           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lojas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>Telefone</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($lojas as $loja)
                                        <tr>
                                            <td>{{$loja->nome}}</td>
                                            <td>{{$loja->endereco}}</td>
                                            <td>{{$loja->telefone}}</td>

                                            <td><a href="{{route('edit-loja', $loja->id)}}" class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>


                    </div>

    </div>

@endsection
