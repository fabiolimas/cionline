@extends('layouts.dash')

@section('head')
<link href="{{asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-user"></i> Usuários</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row mb-2">
                        <div class="col-xl-12 col-lg-11">
                        <a href="{{route('usuario')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Novo Cadastro</a>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                                <div class="col-xl-12 col-lg-11">
                           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Loja</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            @switch($usuario->loja_id)
                                            @case (1)
                                            <td>Jacobina</td>
                                            @break
                                             @case (2)
                                            <td>Capim Grosso</td>
                                            @break
                                             @case (3)
                                            <td>Senhor do Bonfim</td>
                                            @break
                                             @case (4)
                                            <td>Juazeiro</td>
                                            @break
                                             @case (5)
                                            <td>Petrolina</td>
                                            @break
                                             @case (6)
                                            <td>River</td>
                                            @break
                                             @case (7)
                                            <td>Escritório</td>
                                            @break
                                            @default
                                            <td>-</td>
                                            @endswitch




                                            <td><a href="{{route('edit-usuario', $usuario->id)}}" class="btn btn-info" title="Visualizar"><i class="fa fa-edit"></i></a> </td>
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
