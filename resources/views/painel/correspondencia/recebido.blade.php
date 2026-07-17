@extends('layouts.dash')

@section('head')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Correspondencias Recebidas</h1>

    </div>

    <div class="row mb-2">
        <div class="col-xl-12 col-lg-11">
            <a href="#" onclick="history.back()" title="voltar"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-backward-step"></i>
                Voltar</a>
            <a href="{{ route('correspondencia', $funcionario) }}"
                class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Novo</a>
        </div>
    </div>

        <!-- Content Row -->
        <div class="row">


            <div class="col-xl-12 col-lg-11">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recebidas</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Origem</th>
                                        <th>Destino</th>
                                        <th>De</th>
                                        <th>Para</th>
                                        <th>Data Envio</th>
                                        <th>Data Receb</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($correspondencias as $correspondencia)
                                        <tr class="@if ($correspondencia->loja_id == Auth::user()->id) bg-light text-dark @else @endif">
                                            <td>{{ $correspondencia->id }}</td>

                                            @switch($correspondencia->loja_origem)
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
                                            @endswitch

                                            @switch($correspondencia->loja_destinatario)
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
                                            @endswitch


                                            <td>{{ $correspondencia->funcionario_origem }}</td>
                                            <td>{{ $correspondencia->funcionario_destinatario }}</td>
                                            <td>{{ date('d-m-Y H:i', strtotime($correspondencia->created_at)) }}</td>
                                            @if ($correspondencia->data_recebimento == null)
                                                <td>-</td>
                                            @else
                                                <td>{{ date('d-m-Y H:i', strtotime($correspondencia->data_recebimento)) }}
                                                </td>
                                            @endif
                                           @if ($correspondencia->status == 'aberto')
                                            <td class="text-danger">Aberto</td>
                                        @elseif($correspondencia->status == 'recusado')
                                            <td class="text-success">Recusada</td>

                                            @else
                                            <td class="text-success">Recebido</td>
                                        @endif
                                            <td><a href="{{ route('ci', $correspondencia->id) }}" class="btn btn-info"
                                                    title="Visualizar"><i class="fa fa-eye"></i></a>

                                                @if ($correspondencia->loja_origem == Auth::user()->loja_id)
                                                    @if ($correspondencia->status == 'recebido')
                                                    @else
                                                        <a href="{{ route('editar-ci', $correspondencia->id) }}"
                                                            class="btn btn-success" title="Editar"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ route('delete', $correspondencia->id) }}"
                                                            class="btn btn-danger" title="Excluir"><i
                                                                class="fa fa-trash"></i></a>
                                                    @endif
                                                @elseif(Auth::user()->loja_id == null)
                                                @else
                                                    @if ($correspondencia->status == 'recebido')
                                                     @else
                                                 <a href="{{ route('recusa', $correspondencia->id) }}"
                                                        class="btn btn-warning" title="Recusar"><i class="fa-solid fa-ban"></i></a>
                                                    <a href="{{ route('confirma', $correspondencia->id) }}"
                                                        class="btn btn-danger" title="Confirmar"><i
                                                            class="fa fa-check"></i></a>
                                                @endif
                                            </td>
                                    @endif
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
