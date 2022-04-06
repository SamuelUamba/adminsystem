@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Registo de Vendendores Informais
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Registos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action="/beneficiario/store" method="POST" enctype="multipart/form-data" validate>
        @csrf
        <div class="col-md-4 mb-3">
            <label for="nome" class="form-label">Nome do Beneficiário</label>
            <input type="text" class="form-control" minlength="7" name="nome" id="nome" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="state"> Gênero</label>
            <select class="custom-select d-block w-100" id="state" name="genero" required="">
                <option value="">Escolha...</option>
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
            <label for="state"> Tipo de Documento de identificação</label>
            <select class="custom-select d-block w-100" id="state" name="tipo_documento" required="">
                <option value="">Escolha...</option>
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
                @foreach ($mercados as $mercado)
                <option value="{{$mercado->nome_mercado}}">{{$mercado->nome_mercado}}</option>
                @endforeach
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
        <div class="col-md-4 mb-3">
            <label for="doc_link" class="form-label">Carregar o documento identificação</label>
            <input type="file" class="form-control" name="doc_link" required>
        </div>

        <div class="col-md-2 mb-3">
            <label for="state"> Inscrito no INSS?</label>
            <select class="custom-select d-block w-100" id="inss" name="inss" required="">
                <option value="">Escolha...</option>
                <option value="1">SIM</option>
                <option value="0">NÃO</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="empresa"> Possui uma Empresa?</label>
            <select class="custom-select d-block w-100" id="empresa" name="empresa" required="">
                <option value="">Escolha...</option>
                <option value="1">SIM</option>
                <option value="0">NÃO</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid empresa.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nome_empresa" class="form-label">Nome da Empresa</label>
            <input type="text" class="form-control" name="nome_empresa">
        </div>
        <div class="content-header col-md-9">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Submeter') }}
            </button>
            <button type="reset" class="btn btn-danger">
                <i class="fa fa-ban" aria-hidden="true"></i> {{ __('Cancelar') }}
            </button>
        </div>
    </form>



</section>
<!-- /.content -->
@endsection