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
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
    <form class="row g-3 needs-validation" action=" /mercados/update/{{$mercado->id}}" method="POST" enctype="multipart/form-data" validate>
        @csrf
        @method('PUT')

        <div class="col-md-8 mb-3">
            <label for="nome_mercado" class="form-label">Nome do Mercado</label>
            <input type="text" class="form-control" name="nome_mercado" value="{{$mercado->nome_mercado}}" id="nome_mercado" required>
        </div>

        <div class="col-md-8 mb-3">
            <label for="tipo"> Tipo</label>
            <select class="custom-select d-block w-100" id="tipo" name="tipo" required="">
                @if(($mercado->tipo)=='1')
                <option value="1" selected>Grossista</option>
                <option value="0">Não Grossista</option>
                @else
                <option value="0" selected>Não Grossista</option>
                <option value="1">Grossista</option>

                @endif
            </select>
        </div>

        <div class="col-md-8 mb-3">
            <label for="cidade" class="form-label">Localização</label>
            <input type="text" class="form-control" value="{{$mercado->cidade}}" name="cidade" required>
        </div>

        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Submeter</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
        </div>
    </form>


    </div>


</section>
<!-- /.content -->
@endsection