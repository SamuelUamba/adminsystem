@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="nav-icon far fa-calendar-alt "></i>
                    Audiências / Desfechos
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Audiências</li>
                    <li class="breadcrumb-item active">Edit/Desfechos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action=" /audiencia/update/{{$audiencia->id}}" method="POST" enctype="multipart/form-data" validate>
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" value="{{$audiencia->numero}}">

        </div>
        <div class="col-md-2">
            <label for="data_marcacao" class="form-label">Data da Marcação</label>
            <input text="date" class="form-control" name="data_marcacao" required value="{{$audiencia->data_marcacao}}">
        </div>

        <div class="col-md-2">
            <label for="gabinete" class="form-label">Gabinete</label>
            <input type="text" class="form-control" name="gabinete" required value="{{$audiencia->gabinete}}">
        </div>
        <div class="col-md-5">
            <label for="solicitante" class="form-label">Nome do Solicitante</label>
            <input type="text" class="form-control" name="solicitante" required value="{{$audiencia->solicitante}}">
        </div>
        <div class="col-md-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input class="form-control" name="contacto" required value="{{$audiencia->contacto}}"></input>
        </div>
        <div class="col-md-8">
            <label for="assunto" class="form-label">Assunto</label>
            <input class="form-control" name="assunto" rows="3" required value="{{$audiencia->assunto}}">
        </div>


        <div class="col-md-5">
            <label for="data_atendimento" class="form-label">Data do Atendimento</label>
            <input type="date" class="form-control" name="data_atendimento" required value="{{$audiencia->data_atendimento}}" style="background-color: #FFFFFF; border: 1px solid #CC0033;">
        </div>
        <div class="col-md-3">
            <label for="tipodespacho" class="form-label">Desfecho</label>

            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="desfecho" id="btnradio1" required autocomplete="off" value="Favoravel">
                <label class="btn btn-outline-primary" for="btnradio1">Favoravel</label>
                <input type="radio" class="btn-check" name="desfecho" id="btnradio2" required autocomplete="off" value="Não Favoravel">
                <label class="btn btn-outline-danger" for="btnradio2">Não Favoravel</label>

            </div>
        </div>
        <div class="col-md-8">
            <label for="oservacao" class="form-label">Observação</label>
            <textarea class="form-control" name="observacao" required rows="3"></textarea>
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