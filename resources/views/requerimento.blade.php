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
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">
    <form class="row g-3 needs-validation" action=" /store" method="POST" enctype="multipart/form-data" validate>
        @csrf
        <div class="col-md-4">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="dataentrada" class="form-label">Data de entrada</label>
            <input type="date" class="form-control" name="dataentrada" required>
        </div>
        <div class="col-md-3">
            <label for="datadespacho" class="form-label">Data do despacho</label>
            <input type="date" class="form-control" name="datadespacho" required>
        </div>
        <div class="col-md-7">
            <label for="requerente" class="form-label">Requerente</label>
            <input type="text" class="form-control" name="requerente" required>
        </div>
        <div class="col-md-3">
            <label for="tipodespacho" class="form-label">Despacho</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="tipodespacho" id="btnradio1" autocomplete="off" value="Procedente" required>
                <label class="btn btn-outline-primary" for="btnradio1">Procedente</label>

                <input type="radio" class="btn-check" name="tipodespacho" id="btnradio2" autocomplete="off" value="Improcedente" required>
                <label class="btn btn-outline-danger" for="btnradio2">Improcedente</label>
            </div>
        </div>
        <div class="col-md-7">
            <label for="assunto" class="form-label">Assunto</label>
            <textarea class="form-control" name="assunto" rows="3" required></textarea>
        </div>
        <div class="content-header col-md-7">
            <button type=" submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection