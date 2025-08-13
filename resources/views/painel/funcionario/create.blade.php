@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-user"></i>Novo Funcionario</h1>

    </div>



    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('store-funcionario')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome">Nome:</label>
                                <input type='text' class="form-control" name="nome" id="nome" required>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="loja">Loja:</label>
                                <select name="loja_id" class="form-control" id="loja_id">


                                    @foreach($lojas as $loja)

                                    <option value="{{$loja->id}}">{{$loja->nome}}</option>

                                    @endforeach

                                </select>
                            </div>


                             <div class="col-md-4 mt-3">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" id="status">

                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
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
