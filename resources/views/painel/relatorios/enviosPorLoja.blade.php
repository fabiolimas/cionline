@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Envios Por Loja</h1>

    </div>

    <div class="row mb-2">
        <div class="col-xl-12 col-lg-11">

        </div>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                        <form class="form" action="" method="post">
                            <div class="row">
                                <h5><i class="fa-solid fa-filter"></i> Filtros</h5><br>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                <div class="form-group">
                                        <label for="loja">Loja</label>
                                        <select class="form-control" name="loja" id="loja">
                                            <option value="">Selecione a loja</option>
                                            @foreach($lojas as $loja)
                                                <option value="{{$loja->id}}">{{$loja->nome}}</option>
                                            @endforeach
                                        </select>

                                </div>
                                </div>


                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">

                <div class="card-body">
                        <div id="result"></div>

                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
@endsection
@section('scripts')
<script>

 $(document).ready(function() {
            $('#loja').on('change', function() {
                var lojaId = $('#loja').val();



                if (lojaId) {
                    $.ajax({
                        url: "{{ url('relatorio/buscaPorLoja') }}/"+lojaId,
                        type: "GET",
                        data:{

                        },
                        success: function(data) {
                            $("#result").html(data);
                        },
                        error: function() {
                            alert("Erro ao carregar correspondencias.");
                        }
                    });
                } else {
                            $("#result").html="nenhuma CI encontrada";
                }
            });
        });
</script>
@endsection
