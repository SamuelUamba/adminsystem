@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="far fa-circle nav-icon"></i>
                    Notas de Envio
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Notas</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action=" /nota/update/{{$nota->id}}" method="POST" enctype="multipart/form-data" validate>
        @csrf
        @method('PUT')
        <div class="col-md-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" value="{{$nota->numero}}" required>
        </div>
        <div class="col-md-4">
            <label for="data_entrada" class="form-label">Data de Entrada</label>
            <input type="date" class="form-control" name="data_entrada" value="{{$nota->data_entrada}}" required>
        </div>

        <div class="col-md-4">
            <label for="classificacao" class="form-label">Classificação</label>
            <input type="text" class="form-control" name="classificacao" value="{{$nota->classificacao}}" required>
        </div>
        <div class="col-md-3">
            <label for="data_emissao" class="form-label">Data de Emissão</label>
            <input type="date" class="form-control" name="data_emissao" value="{{$nota->data_emissao}}" required>
        </div>
        <div class="col-md-3">
            <label for="proveniencia" class="form-label">Proveniencia</label>
            <input type="text" class="form-control" name="proveniencia" value="{{$nota->proveniencia}}" required>
        </div>
        <div class="col-md-4">
            <label for="data_despacho" class="form-label">Data do Despacho</label>
            <input type="date" class="form-control" name="data_despacho" value="{{$nota->data_despacho}}" required>
        </div>
        <div class="col-md-6">
            <label for="assunto" class="form-label">Assunto</label>
            <input class="form-control" name="assunto" rows="3" value="{{$nota->assunto}}" style="height: 100px;"></input>
        </div>
        <div class="col-md-4">
            <label for="despacho" class="form-label">Despacho</label>
            <input class="form-control" name="despacho" rows="3" value="{{$nota->despacho}}" style="height: 100px;"></input>
        </div>

        <div class="content-header col-md-12">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>

    </div>


</section>
<!-- /.content -->
@endsection