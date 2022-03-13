@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Requerimentos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Requerimentos</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action=" /update/{{$requerimento->id}}" method="POST" enctype="multipart/form-data" validate>
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" readonly value="{{$requerimento->numero}}">

        </div>
        <div class="col-md-3">
            <label for="dataentrada" class="form-label">Data de entrada</label>
            <input type="text" class="form-control" name="data_entrada" readonly value="{{$requerimento->created_at}}">
        </div>
        <div class="col-md-4">
            <label for="datadespacho" class="form-label">Data do despacho</label>
            <input type="date" class="form-control" name="data_despacho" required value="{{$requerimento->data_despacho}}" style="background-color: #FFFFFF; border: 1px solid #CC0033;">
        </div>
        <div class="col-md-7">
            <label for="requerente" class="form-label">Requerente</label>
            <input type="text" class="form-control" name="requerente" readonly value="{{$requerimento->requerente}}">
        </div>
        <div class="col-md-3">
            <label for="tipodespacho" class="form-label">Despacho</label>

            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="tipo_despacho" id="btnradio1" required autocomplete="off" value="Procedente">
                <label class="btn btn-outline-primary" for="btnradio1">Procedente</label>
                <input type="radio" class="btn-check" name="tipo_despacho" id="btnradio2" required autocomplete="off" value="Improcedente">
                <label class="btn btn-outline-danger" for="btnradio2">Improcedente</label>

            </div>
        </div>
        <div class="col-md-7">
            <label for="assunto" class="form-label">Assunto</label>
            <input class="form-control" name="assunto" rows="3" readonly value="{{$requerimento->assunto}}"></input>
        </div>
        <div class="col-md-4">
            <label for="observacao" class="form-label">Observação</label>
            <input class="form-control" name="observacao" rows="3" value="{{$requerimento->assunto}}" style="background-color: #FFFFFF; border: 1px solid #CC0033;"></input>
        </div>
        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>

    </div>


</section>
<!-- /.content -->
@endsection