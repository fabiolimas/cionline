@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-paper-plane"></i> Editar Correspondencia Interna</h1>

    </div>
     <div class="col-xl-3 col-lg-3 mb-3">
                        <a href="#" onclick="history.back()" title="voltar" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-backward-step"></i> Voltar</a>
                        </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('update-ci', $ci->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-3">
                                <label for="origem">Origem</label>

                                <select name="loja_origem" id="origem" class="form-control" @readonly(true)>
                                    <option value="{{$lojao->id}}">{{$lojao->nome}}</option>
                                    @foreach ($lojas as $loja)
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="destino">Destino</label>
                                <select name="loja_destinatario" id="destino" class="form-control">
                                    <option value="{{$lojad->id}}">{{$lojad->nome}}</option>
                                    @foreach ($lojas as $loja)
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="de">De</label>
                                <select name="funcionario_origem" id="de" class="form-control">
                                    <option value="{{$de->id}}">{{$de->nome}}</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="para">Para</label>
                                <select name="funcionario_destinatario" id="para" class="form-control">
                                    <option value="{{$para->id}}">{{$para->nome}}</option>
                                </select>
                            </div>


                           <div class="row d-flex mt-3">
    <div class="col-md-5 offset-3">
        <button class="btn btn-danger" title="Adicionar item" id="addItem">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
</div>

<div class="col-md-12 mt-3" id="itensContainer">

    <label for="itens">Itens</label>
    @foreach($ciItens as $citem)
    <div class="input-group mb-2 ">
        <input type="text" name="itens[]" class="form-control" value="{{$citem->descricao}}" readonly>
        <a href="{{route('delete-item', $citem->id)}}" class="btn btn-danger removeItem" type="button">
            <i class="fa-solid fa-trash"></i>
        </a>

    </div>
    @endforeach
</div>


                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script>

      $(document).ready(function() {
    // Adicionar novo campo
    $('#addItem').on('click', function(e) {
        e.preventDefault();

        $('#itensContainer').append(`
            <div class="input-group mb-2">
                <input type="text" name="itens[]" class="form-control">
                <button class="btn btn-danger removeItem" type="button">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `);
    });

    // Remover campo
    $(document).on('click', '.removeItem', function() {
        $(this).closest('.input-group').remove();
    });
});

        $(document).ready(function() {
            $('#origem').on('change', function() {
                var lojaId = $(this).val();

                if (lojaId) {
                    $.ajax({
                        url: "{{ url('/funcionarios-por-loja') }}/" + lojaId,
                        type: "GET",
                        success: function(data) {
                            $('#de').empty().append('<option value="">Selecione</option>');
                            $.each(data, function(key, funcionario) {
                                $('#de').append('<option value="' + funcionario.id +
                                    '">' + funcionario.nome + '</option>');
                            });
                        },
                        error: function() {
                            alert("Erro ao carregar funcionários.");
                        }
                    });
                } else {
                    $('#de').empty().append('<option value="">Selecione</option>');
                }
            });
        });

        $(document).ready(function() {
            $('#destino').on('change', function() {
                var lojaId = $(this).val();

                if (lojaId) {
                    $.ajax({
                        url: "{{ url('/funcionarios-por-loja') }}/" + lojaId,
                        type: "GET",
                        success: function(data) {
                            $('#para').empty().append('<option value="">Selecione</option>');
                            $.each(data, function(key, funcionario) {
                                $('#para').append('<option value="' + funcionario.id +
                                    '">' + funcionario.nome + '</option>');
                            });
                        },
                        error: function() {
                            alert("Erro ao carregar funcionários.");
                        }
                    });
                } else {
                    $('#de').empty().append('<option value="">Selecione</option>');
                }
            });
        });
    </script>
@endsection
