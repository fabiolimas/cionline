@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-user"></i>Editar Funcionario</h1>

    </div>



    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('update-funcionario', $funcionario->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome">Nome:</label>
                                <input type='text' class="form-control" name="nome" value="{{$funcionario->nome}}" id="nome">
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="loja">Loja:</label>
                                <select name="loja_id" class="form-control" id="loja_id">
                                    @switch($funcionario->loja_id)
                                    @case (1)

                                    <option value="{{$funcionario->loja_id}}">Jacobina</option>
                                    @break;

                                    @case (2)
                                     <option value="{{$funcionario->loja_id}}">Capim Grosso</option>
                                    @break;
                                    @case (3)
                                     <option value="{{$funcionario->loja_id}}">Senhor do Bonfim</option>
                                    @break;
                                      @case (4)
                                     <option value="{{$funcionario->loja_id}}">Juazeiro</option>
                                    @break;
                                      @case (5)
                                     <option value="{{$funcionario->loja_id}}">Petrolina</option>
                                    @break;
                                        @case (6)
                                     <option value="{{$funcionario->loja_id}}">River</option>
                                    @break;
                                        @case (7)
                                     <option value="{{$funcionario->loja_id}}">Escritório</option>
                                    @break;

                                    @endswitch

                                    @foreach($lojas as $loja)

                                    <option value="{{$loja->id}}">{{$loja->nome}}</option>

                                    @endforeach

                                </select>
                            </div>


                             <div class="col-md-4 mt-3">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" id="status">
                                    @switch($funcionario->status)
                                    @case ('ativo')

                                    <option value="ativo">Ativo</option>
                                    @break;

                                    @case ('inativo')
                                     <option value="inativo">Inativo</option>
                                    @break;

                                    @endswitch

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
