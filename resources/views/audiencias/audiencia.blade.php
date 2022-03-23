@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="nav-icon far fa-calendar-alt "></i>
                    Registo de Vendendores Informais
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Registos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action="/audiencia/store" method="POST" enctype="multipart/form-data" validate>
        @csrf
        <div class="col-md-4 mb-3">
            <label for="nome" class="form-label">Nome do Beneficiário</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="state"> Gênero</label>
            <select class="custom-select d-block w-100" id="state" name="genero" required="">
                <option value="">Choose...</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" required>
        </div>


        <div class="col-md-4 mb-3">
            <label for="numero_telefone" class="form-label">Número de Telefone</label>
            <input type="text" class="form-control" name="numero_telefone" maxlength="14" required>
        </div>


        <div class="col-md-4 mb-3">
            <label for="state"> Tipo de Documento</label>
            <select class="custom-select d-block w-100" id="state" name="tipo_documento" required="">
                <option value="">Choose...</option>
                <option value="BI">BI</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Carta de Condução">Carta de Condução</option>
                <option value="Cartao de Eleitor">Cartao de Eleitor</option>
                <option value="Outro">Outro</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="numero_documento" class="form-label">Número do Documento</label>
            <input type="text" class="form-control" name="numero_documento" required>
        </div>



        <div class="col-md-4 mb-3">
            <label for="state"> Mercado</label>
            <select class="custom-select d-block w-100" id="state" name="nome_mercado" required="">
                <option value="">Choose...</option>
                <option value="Mercado Fajardo">Mercado Fajardo</option>
                <option value="Mercado Malanga">Mercado Fajardo</option>
                <option value="Mercado Grossista do Zimpeto">Mercado Grossista do Zimpeto</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="tipo_actividade" class="form-label">Tipo de Actividade</label>
            <input type="text" class="form-control" name="tipo_actividade" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="ano_inicio" class="form-label">Data de Início da Actividade</label>
            <input type="date" class="form-control" name="ano_inicio" required>
        </div>

        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>



</section>
<!-- /.content -->
@endsection