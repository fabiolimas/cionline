@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-user"></i>Editar Usuário</h1>

    </div>



    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{ route('update-usuario', $usuario->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome">Nome:</label>
                                <input type='text' class="form-control" name="name" value="{{ $usuario->name }}"
                                    id="nome">
                            </div>


                            <div class="col-md-6 mt-3">
                                    <label for="loja">Loja:</label>
                                    <select name="loja_id" class="form-control" id="loja_id">
                                        @if($usuario->loja_id == null)
                                        <option value="">-</option>
                                        @else
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                        @foreach ($lojas as $loj)
                                            <option value="{{ $loj->id }}">{{ $loj->nome }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                            <div class="col-md-6 mt-3">
                                <label for="permissao">Permissão:</label>
                                <select name="role" class="form-control" id="permissao">
                                    @switch($usuario->role)
                                        @case ('admin')
                                            <option value="{{ $usuario->role }}">Administrador</option>
                                        @break;
                                        @case ('loja')
                                            <option value="{{ $usuario->role }}">Loja</option>
                                        @break;
                                    @endswitch

                                    <option value="admin">Administrador</option>
                                    <option value="loja">Loja</option>
                                </select>


                            </div>
                             <div class="col-md-6 mt-3">
                                <label for="mail">Email:</label>
                                <input type='mail' class="form-control" name="mail" value="{{ $usuario->email }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="password">Senha:</label>

                                <input type='password' class="form-control" name="password"
                                    value="{{ $usuario->password }}">

                                <span class="small text-danger">Deixe em branco caso não queira alterar</span>
                            </div>



                        </div>
                        <div class="row">



                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-disk"></i>
                                    Salvar</button>
                            </div>


                        </div>
                    </form>


                </div>
            </div>
        </div>


    </div>
@endsection
