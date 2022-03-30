@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Painel de Monitoria e Avaliação</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <h3>3</h3>
                        <h3>Total de Mercados</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-copy"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalinss->count()}}</h3>
                        <h3> Inscritos no INSS</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais infomações<i class="fas fa-arrow-circle-right"></i></a>
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
<!-- /.content -->
@endsection