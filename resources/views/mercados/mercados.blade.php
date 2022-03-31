@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6" style="text-align: center;">
                <h1>
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Registo de Mercados
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Mercados</li>
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
    <form class="col-md-8 mb-3" action="/mercados/store" method="POST" validate>
        @csrf
        <div class="col-md-8 mb-3">
            <label for="nome_mercado" class="form-label">Nome do Mercado</label>
            <input type="text" class="form-control" name="nome_mercado" id="nome_mercado" required>
        </div>

        <div class="col-md-8 mb-3">
            <label for="tipo"> Tipo</label>
            <select class="custom-select d-block w-100" id="tipo" name="tipo" required="">
                <option value="">Escolha...</option>
                <option value="1">Grossista</option>
                <option value="0">Não Grossista</option>
            </select>
        </div>

        <div class="col-md-8 mb-3">
            <label for="cidade" class="form-label">Localização</label>
            <input type="text" class="form-control" name="cidade" required>
        </div>

        <div class="content-header col-md-9">
            <button type=" submit" id="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submeter</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
        </div>
    </form>



</section>
<!-- /.content -->
@endsection