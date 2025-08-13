@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-store"></i>Editar loja</h1>

    </div>



    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('update-loja', $loja->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome">Nome:</label>
                                <input type='text' class="form-control" name="nome" value="{{$loja->nome}}">
                            </div>
                            <div class="col-md-4 mt-3">
                              <label for="endereco">Endereço:</label>
                                <input type='text' class="form-control" name="endereco" value="{{$loja->endereco}}">
                            </div>
                             <div class="col-md-4 mt-3">
                                <label for="bairro">Bairro:</label>
                                <input type='text'  class="form-control" name="bairro" value="{{$loja->bairro}}">
                            </div>

                             <div class="col-md-4 mt-3">
                                <label for="cidade">Cidade:</label>
                                <input type='text'  class="form-control" name="cidade" value="{{$loja->cidade}}">
                            </div>

                              <div class="col-md-4 mt-3">
                                <label for="telefone">Telefone:</label>
                                <input type='text'  class="form-control" name="telefone" value="{{$loja->telefone}}">
                            </div>

                        </div>
                        <div class="row">



                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-disk"></i> Salvar</button>
                            </div>


                        </div>
                    </form>


                </div>
            </div>
        </div>


    </div>


@endsection
