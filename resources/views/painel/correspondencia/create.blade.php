@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-paper-plane"></i> Nova Correspondencia Interna</h1>

    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('store-correspondencia')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="origem">Origem</label>

                                <select name="origem" id="origem" class="form-control">
                                    <option value="">Selecione a loja de origem</option>
                                    @foreach ($lojas as $loja)
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="destino">Destino</label>
                                <select name="destino" id="destino" class="form-control">
                                    <option value="">Selecione a loja de destino</option>
                                    @foreach ($lojas as $loja)
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="de">De</label>
                                <select name="de" id="de" class="form-control">
                                    <option value="">Selecione</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="para">Para</label>
                                <select name="para" id="para" class="form-control">
                                    <option value="">Selecione o destinatário</option>
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
    <label for="itens">Itens <span class="small text-danger">(detalhe o maximo possivel a descrição de cada item enviado)</span></label>
    <div class="input-group mb-2 ">
        <input type="text" name="itens[]" class="form-control">
        <button class="btn btn-danger removeItem" type="button">
            <i class="fa-solid fa-trash"></i>
        </button>
    </div>
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
