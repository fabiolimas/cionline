<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CI Online</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3"><img src="{{ asset('assets/img/logo.png') }}" class="w-100"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('correspondencias')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Corresondencia Interna</span></a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ci"
                    aria-expanded="true" aria-controls="ci">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Correspondencia Interna</span>
                </a>
                <div id="ci" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('correspondencias') }}">Todos</a>
                        @can('loja')
                        <a class="collapse-item" href="{{ route('ci-enviado') }}">Envios</a>
                        <a class="collapse-item" href="{{ route('ci-recebido') }}">Recebimentos</a>
                        @endcan

                    </div>
                </div>
            </li>
                @can('admin')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('loja.lojas') }}">Lojas</a>
                        <a class="collapse-item" href="{{ route('usuario.usuarios') }}">Usuários</a>
                        <a class="collapse-item" href="{{ route('funcionario.funcionarios') }}">Funcionarios</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#relatorios"
                    aria-expanded="true" aria-controls="relatorios">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Relatórios</span>
                </a>
                <div id="relatorios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('relatorio.envios-por-loja') }}">Envios por loja</a>
                        <a class="collapse-item" href="{{ route('envios-por-item') }}">Envios por Item</a>

                    </div>
                </div>
            </li>
            @endcan






        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <i class="fas fa-bell fa-fw"></i> --}}
                                <!-- Counter - Alerts -->
                                {{-- <span class="badge badge-danger badge-counter">3+</span> --}}
                            </a>
                            <!-- Dropdown - Alerts -->

                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                {{-- <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/img/undraw_profile.svg') }}"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a> --}}


                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                    class="dropdown-item ">
                                    <i data-feather="log-out"></i>
                                    <div>
                                       <i class="fa-solid fa-door-open fa-sm fa-fw mr-2 text-gray-400"></i>  Sair
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
                    @yield('content')


                    <!-- Page Heading -->


                    <!-- Bootstrap core JavaScript-->
                    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
                    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

                    <!-- Page level plugins -->
                    <script src="{{ asset('chart.js/Chart.min.js') }}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
                    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
                    @yield('scripts')
</body>

</html>
