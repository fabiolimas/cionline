@extends('layouts.dash')


@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">


                    </div>

                    <div class="row mb-2 d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3">
                        <a href="#" onclick="history.back()" title="voltar" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-backward-step"></i> Voltar</a>
                        </div>
                           @if ($ci->loja_id == Auth::user()->id)


                           @else
                           @if($ci->status == 'recebido')

                           @else
                           @can('loja')
                        <div class="col-xl-3 ">
                             <a href="{{route('confirma', $ci->id)}}" class="d-none d-sm-inline-block btn  btn-danger shadow-sm"><i
                                class="fas fa-check fa-sm text-white-50"></i> Confirmar Recebimento</a>
                        </div>
                        @endcan
                        @endif
                        @endif
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">


                                <div class="col-xl-12 col-lg-11">
                           <div class="card shadow mb-4">

                        <div class="card-body">

                            <div class="row mb-3">
                                 <div class="col-md-2">
                                  <div class="logoci">
                                    <img src="{{asset('assets/img/logo.png')}}" class="w-50">
                                  </div>
                                </div>

                                <div class="col-md-6 text-center d-flex justify-content-center ">
                                  <h4>Correspondência Interna</h4><br>

                                </div>
                                <div class="col-md-2"><p><span class="data m-1"> <i class="fa-solid fa-calendar " ></i> {{date('d-m-Y', strtotime($ci->created_at))}}</span></p></div>
                                <div class="col-md-2">
                                  <h4>Nº {{$ci->id}}</h4>
                                </div>

                            </div>
                            <div class="row cabecalhoCi">
                                <div class="col-md-3">
                                    <span class="origem"><i class="fa-solid fa-location-pin text-primary"></i> Origem:

                                @switch($ci->loja_origem)
                                            @case (1)
                                           Jacobina
                                            @break
                                             @case (2)
                                            Capim Grosso
                                            @break
                                             @case (3)
                                            Senhor do Bonfim
                                            @break
                                             @case (4)
                                           Juazeiro
                                            @break
                                             @case (5)
                                            Petrolina
                                            @break
                                             @case (6)
                                            River
                                            @break
                                             @case (7)
                                            Escritório
                                            @break
                                            @endswitch
                                            </span>
                                         </div>

                                            <div class="col-md-3"><span class="destino"><i class="fa fa-location-pin text-primary"></i> Destino:
                                             @switch($ci->loja_destinatario)
                                            @case (1)
                                            Jacobina
                                            @break
                                             @case (2)
                                            Capim Grosso
                                            @break
                                             @case (3)
                                            Senhor do Bonfim
                                            @break
                                             @case (4)
                                            Juazeiro
                                            @break
                                             @case (5)
                                            Petrolina
                                            @break
                                             @case (6)
                                            River
                                            @break
                                             @case (7)
                                           Escritório
                                            @break
                                            @endswitch
                                            </span></div>
                                            <div class="col-md-3"><i class="fa fa-user text-primary"></i> De:
                                            {{$ci->funcionario_origem}}</div>
                                            <div class="col-md-3"><i class="fa fa-user text-primary"></i> Para:
                                            {{$ci->funcionario_destinatario}}</div>


                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descrição</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($ciItens as $item)
                                        <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$item->descricao}}</td>

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
