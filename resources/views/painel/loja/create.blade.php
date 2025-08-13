@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-store"></i>Cadastrar loja</h1>

    </div>



    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('store-loja')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome">Nome:</label>
                                <input type='text' class="form-control" name="nome" required>
                            </div>
                            <div class="col-md-4 mt-3">
                              <label for="endereco">Endereço:</label>
                                <input type='text' class="form-control" name="endereco" required>
                            </div>
                             <div class="col-md-4 mt-3">
                                <label for="bairro">Bairro:</label>
                                <input type='text'  class="form-control" name="bairro" required>
                            </div>

                             <div class="col-md-4 mt-3">
                                <label for="cidade">Cidade:</label>
                                <input type='text'  class="form-control" name="cidade" required>
                            </div>

                              <div class="col-md-4 mt-3">
                                <label for="telefone">Telefone:</label>
                                <input type='text'  class="form-control" name="telefone" required>
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
