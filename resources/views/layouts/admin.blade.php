@include('includes.header')

<body class=" hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <!-- <i class="fa fa-cog fa-1x" aria-hidden="true"></i> -->
                        <div class="image">
                            <img src="{{ asset('dist/img/logo.png') }}" style="width: 100px;" class="img-circle elevation-0" alt="User Image">
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                        <a href="#" class="nav-link" style="word-spacing: 5px;">
                            <i class=" fa fa-user fa-1x "> </i>
                            {{ Auth::user()->name }}</a>

                        <div class=" dropdown-divider">
                        </div>

                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon far fa-circle text-danger fa-1x"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">


                <div class="image">
                    <img src="{{ asset('dist/img/kufmet.png') }}" style="width: 200px;" class="img-circle elevation-100" alt="Logo">
                </div>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                        @if((Auth::user()->tipo)=='operador')
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link active">
                                        <i class="fa fa-tachometer fa-2x" style="color:blue" aria-hidden="true"></i>
                                        <strong>
                                            <p>PAINEL GERAL </p>
                                        </strong>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <strong>
                        <li class="nav-header">
                            <!-- <h3>Espaco dado</h3> -->
                        </li>
                        </strong>

                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/register_beneficiario" class=" nav-link">
                                        <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                                        <p> Novo Benefici??rio </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/getRegistos" class=" nav-link">
                                        <i class="fas fa-list fa-2x"></i>
                                        <p> Lista dos Beneficiarios </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        @endif
                        <!-- Supervisor -->

                        @if((Auth::user()->tipo)=='supervisor')
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link active">
                                        <i class="fa fa-tachometer fa-2x" style="color:blue" aria-hidden="true"></i>
                                        <strong>
                                            <p>PAINEL GERAL </p>
                                        </strong>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <strong>
                        <li class="nav-header">
                            <!-- <h3>Espaco dado</h3> -->
                        </li>
                        </strong>

                        <!-- <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/register_beneficiario" class=" nav-link">
                                        <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                                        <p> Novo Benefici??rio </p>
                                    </a>
                                </li>

                            </ul>
                        </li> -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/getRegistos" class=" nav-link">
                                        <i class="fas fa-list fa-2x"></i>
                                        <p> Lista dos Beneficiarios </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        @endif
                        <li class="nav-item menu-open">
                            <strong>
                        <li class="nav-header">
                            <!-- <h3>Espaco dado</h3> -->
                        </li>
                        </strong>
                        <!-- MENULIST ADMINISTRADOR -->
                        @if((Auth::user()->tipo)=='administrador')
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link active">
                                        <i class="fa fa-tachometer fa-2x" style="color:blue" aria-hidden="true"></i>
                                        <strong>
                                            <p>PAINEL GERAL </p>
                                        </strong>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <strong>
                        <li class="nav-header">
                            <!-- <h3>Espaco dado</h3> -->
                        </li>
                        </strong>

                        <!-- <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/register_beneficiario" class=" nav-link">
                                        <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                                        <p> Novo Benefici??rio </p>
                                    </a>
                                </li>

                            </ul>
                        </li> -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/getRegistos" class=" nav-link">
                                        <i class="fa fa-users fa-2x"></i>
                                        <strong>
                                            <p> Beneficiarios </p>
                                        </strong>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                <strong>
                                    <p> Usu??rios </p>
                                </strong>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/register" class=" nav-link">
                                        <i class="fa fa-user-plus " aria-hidden="true"></i>
                                        <p>Adicionar Novo </p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/user/list" class=" nav-link">
                                        <i class="fas fa-list "> </i>
                                        <p>Lista de Usu??rios</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                <strong>
                                    <p> Mercados </p>
                                </strong>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/mercados" class=" nav-link">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <p>Adicionar Mercados</p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/mercados/list" class=" nav-link">
                                        <i class="fas fa-list "> </i>
                                        <p>Lista de Mercados</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; CONSILMO-KUFMET</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Vers??o</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('includes.links_scriptes')
    @include('sweetalert::alert')
</body>
@include('includes.alerts')

</html>