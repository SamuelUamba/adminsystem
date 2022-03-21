@extends('layouts.admin')
@include('includes.include_geral')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

                <h1 class="m-0">
                    <i class="nav-icon fas fa-copy"></i>
                    Requerimentos
                </h1>
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


        <div class="col-md-3">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="dataentrada" class="form-label">Data de entrada</label>
            <input type="date" class="form-control" name="data_entrada" required>
        </div>

        <div class="col-md-5">
            <label for="requerente" class="form-label">Requerente</label>
            <input type="text" class="form-control" name="requerente" required>
        </div>
        <div class="col-md-6">
            <label for="assunto" class="form-label">Assunto</label>
            <textarea class="form-control" id="textarea" name="assunto" rows="3" required></textarea>
        </div>
        <div class="col-md-5">
            <label for="oservacao" class="form-label">Observação</label>
            <textarea class="form-control" id="textarea" name="observacao" rows="3"></textarea>
        </div>
        <div class="col-md-6">
            <label for="contacto" class="form-label">Contacto</label>
            <input class="form-control" name="contacto" required></input>
        </div>
        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
    <h2>Tabela de Registos</h2>
    <div class="col-md-4">
        <form action="{{route('requerimeto.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Filtrar...">
            <button type=" submit" id="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table caption-top">

            <thead>
                <tr>
                    <th scope="col">Número do Requerimento</th>
                    <th scope="col">Requerente</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Data de entrada</th>
                    <th scope="col">Despacho</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($requerimentos->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($requerimentos as $requerimento)
                <tr>
                    <td>{{ $requerimento->numero }}</td>
                    <td>{{ $requerimento->requerente }}</td>
                    <td>{{ $requerimento->assunto }}</td>
                    <td>{{ $requerimento->data_entrada }}</td>
                    @if(($requerimento->tipo_despacho) =='')
                    <td>Pendente</td>
                    @else
                    <td>{{ $requerimento->tipo_despacho }}</td>
                    @endif

                    <td>
                        <a class="btn btn-sm btn-success" href="/edit/{{$requerimento->id}}">Editar/Despacho</a>
                        <form style="display:inline-block" action="/destroy/{{$requerimento->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger"> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>
            @if(isset($filters))
            {{ $requerimentos->appends($filters)->links() }}
            @else
            {{ $requerimentos->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
            <p>
                Visualizando {{$requerimentos->count()}} de {{ $requerimentos->total() }} requerimento(s).
            </p>


    </div>


</section>
<!-- /.content -->
@endsection