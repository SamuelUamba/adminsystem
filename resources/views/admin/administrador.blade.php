@extends('layouts.admin')
@section('content')

<!-- /.content-header -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Total de Mercados</h3>
                        <h3>{{$mercados->count()}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>

                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Beneficiários</h3>
                        <h4>Masculino:{{$totalM->count()}}</h4>
                        <h4>Femenino:{{$totalF->count()}}</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-2x"></i>

                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3> Inscritos no INSS</h3>
                        <h3>{{$totalinss->count()}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações<i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<div class="col-sm-6">
    <h3 class="m-0">Usuários do Sistema</h3>
</div><!-- /.col -->
<!-- /.content -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>Administradores</h3>
                        <h3>{{$admin->count()}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cogs fa-2x" aria-hidden="true"> </i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Supervisores</h3>
                        <h3>{{$supervisor->count()}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Operadores</h3>
                        <h3>{{$operadores->count()}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<!-- /.content -->


@endsection