@extends('layouts.dash')

@section('content')
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    <!-- Content Row -->
    @can('loja')
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Enviadas </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $enviadas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-paper-plane fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Recebidas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recebidas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendente
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pendente }}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        </div>
    @endcan
    @can('admin')
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Enviadas </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $enviadas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-paper-plane fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Recebidas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recebidas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendente
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pendente }}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        </div>
    @endcan


    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4 w-100">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        Ultimas CI Enviadas


                    </div>
                    <div class="row">
                        @foreach ($ultimosEnvios as $envs)
                            <a href="{{ route('ci', $envs->id) }}" class="nav-link w-100"
                                                title="Visualizar"><div class="row ultimosEnvios bg-secondary m-2 text-white ">
                                <div class="col-md-12">
                                    <span class="nci">Nº {{ $envs->id }}</span>
                                </div>

                                @switch($envs->loja_destinatario)
                                    @case (1)
                                        <div class="col-md-12">Para: Jacobina</div>
                                    @break

                                    @case (2)
                                        <div class="col-md-12">Para: Capim Grosso</div>
                                    @break

                                    @case (3)
                                        <div class="col-md-12">Para: Senhor do Bonfim</div>
                                    @break

                                    @case (4)
                                        <div class="col-md-12">Para: Juazeiro</div>
                                    @break

                                    @case (5)
                                        <div class="col-md-12">Para: Petrolina</div>
                                    @break

                                    @case (6)
                                        <div class="col-md-12">Para: River</div>
                                    @break

                                    @case (7)
                                        <div class="col-md-12">Para: Escritório</div>
                                    @break
                                @endswitch
                                <div class="col-md-12">Aos cudiados de: {{ $envs->funcionario_destinatario }}</div>

                            </div></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        Acesso Rápido


                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-md-6 itemAcessoRapido d-flex text-center">
                            <a href="{{ route('correspondencia') }}" class="nav-link"><span class="icon bg-success"><i
                                        class="fa-solid fa-plus text-white"></i></span><span class="nomeBt">Novo
                                    Envio</span></a>
                        </div>
                        <div class="col-xl-5 col-md-6 itemAcessoRapido d-flex text-center">
                            <a href="{{ route('correspondencias') }}" class="nav-link"><span class="icon bg-warning"><i
                                        class="fa-solid fa-chart-simple text-white"></i></span><span
                                    class="nomeBt">Histórico de envios</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        A Receber


                    </div>
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
                                        @foreach($correspondencias as $correspondencia)
                                        <tr class="@if($correspondencia->loja_id == Auth::user()->id) bg-light text-dark @else  @endif">
                                           <td>{{$correspondencia->id}}</td>
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


                                            <td>{{$correspondencia->funcionario_origem}}</td>
                                             <td>{{$correspondencia->funcionario_destinatario}}</td>
                                           <td>{{$correspondencia->data_envio}}</td>
                                            <td>{{$correspondencia->data_recebimento}}</td>
                                            @if($correspondencia->status == 'aberto')
                                            <td class="text-danger">Aberto</td>
                                                @else
                                                <td class="text-success">Recebido</td>

                                              @endif
                                            <td><a href="{{ route('ci', $correspondencia->id) }}" class="btn btn-info"
                                                title="Visualizar"><i class="fa fa-eye"></i></a>

                                            @if ($correspondencia->loja_id == Auth::user()->id)
                                            @if($correspondencia->status == 'recebido')

                                            @else

                                             <a href="{{route('editar-ci', $correspondencia->id)}}" class="btn btn-success" title="Editar"><i
                                                        class="fa fa-pencil"></i></a>
                                            <a href="{{route('delete', $correspondencia->id)}}" class="btn btn-danger" title="Excluir"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif
                                            @else
                                               @if($correspondencia->status == 'recebido')

                                               @else
                                                <a href="{{route('confirma', $correspondencia->id)}}" class="btn btn-danger" title="Confirmar"><i
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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Imagem {{ date('Y') }}</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
