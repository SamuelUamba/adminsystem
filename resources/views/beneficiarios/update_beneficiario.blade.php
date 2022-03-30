@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                    Actualização de dados
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Registos</li>
                    <li class="breadcrumb-item active">Actualização de dados</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form class="row g-3 needs-validation" action=" /beneficiario/update/{{$beneficiarios->id}}" method="POST" enctype="multipart/form-data" validate>
        @csrf
        @method('PUT')

        <div class="col-md-4 mb-3">
            <label for="nome" class="form-label">Nome do Beneficiário</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$beneficiarios->nome}}" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="state"> Gênero</label>
            <select class="custom-select d-block w-100" id="state" name="genero" required="">
                @if(($beneficiarios->genero) =='M')
                <option value="M" selected>Masculino</option>
                <option value="F">Femenino</option>

                @else
                <option value="F" selected>Femenino</option>
                <option value="M">Masculino</option>

                @endif
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" value="{{$beneficiarios->data_nascimento}}" required>
        </div>


        <div class="col-md-4 mb-3">
            <label for="numero_telefone" class="form-label">Número de Telefone</label>
            <input type="text" class="form-control" name="numero_telefone" maxlength="14" value="{{$beneficiarios->numero_telefone}}" required>
        </div>


        <div class="col-md-4 mb-3">
            <label for="state"> Tipo de Documento</label>
            <select class="custom-select d-block w-100" id="state" name="tipo_documento" required="">
                @if(($beneficiarios->tipo_documento) =='BI')
                <option value="BI" selected>BI</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Carta de Condução">Carta de Condução</option>
                <option value="Cartao de Eleitor">Cartão de Eleitor</option>
                <option value="Outro">Outro</option>

                @elseif(($beneficiarios->tipo_documento) =='Passaporte')
                <option value="BI">BI</option>
                <option value="Passaporte" selected>Passaporte</option>
                <option value="Carta de Condução">Carta de Condução</option>
                <option value="Cartao de Eleitor">Cartão de Eleitor</option>
                <option value="Outro">Outro</option>
                @elseif(($beneficiarios->tipo_documento) =='Carta de Condução')

                <option value="BI">BI</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Carta de Condução" selected>Carta de Condução</option>
                <option value="Cartao de Eleitor">Cartão de Eleitor</option>
                <option value="Outro">Outro</option>

                @elseif(($beneficiarios->tipo_documento) =='Cartao de Eleitor')
                <option value="BI">BI</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Carta de Condução">Carta de Condução</option>
                <option value="Cartao de Eleitor" selected>Cartão de Eleitor</option>
                <option value="Outro">Outro</option>

                @elseif(($beneficiarios->tipo_documento) =='Outro')
                <option value="BI">BI</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Carta de Condução">Carta de Condução</option>
                <option value="Cartao de Eleitor">Cartão de Eleitor</option>
                <option value="Outro" selected>Outro</option>
                @endif
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="numero_documento" class="form-label">Número do Documento</label>
            <input type="text" class="form-control" name="numero_documento" value="{{$beneficiarios->numero_documento}}" required>
        </div>


        <div class="col-md-4 mb-3">
            <label for="state"> Mercado</label>
            <select class="custom-select d-block w-100" id="state" name="nome_mercado" value="{{$beneficiarios->nome}}" required="">

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
            <input type="text" class="form-control" name="tipo_actividade" value="{{$beneficiarios->tipo_actividade}}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="ano_inicio" class="form-label">Data de Início da Actividade</label>
            <input type="date" class="form-control" name="ano_inicio" value="{{$beneficiarios->ano_inicio}}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="doc_link" class="form-label" style="color: red;">Novo Documento."Apenas se Necessario"</label>
            <input type="file" class="form-control" value="{{$beneficiarios->doc_link}}" name="doc_link">
        </div>
        <div class="col-md-2 mb-3">
            <label for="state"> Inscrito no INSS?</label>
            <select class="custom-select d-block w-100" id="inss" name="inss" required="">
                @if(($beneficiarios->inss) =='1')
                <option value="1" selected>SIM</option>
                <option value="0">NÃO</option>

                @else
                <option value="0" selected>NÃO</option>
                <option value="1">SIM</option>

                @endif
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
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