@extends('layouts.admin')
@include('includes.include_geral')
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Notas</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action="/nota/store" method="POST" enctype="multipart/form-data" validate>
        @csrf
        <div class="col-md-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" required>
        </div>
        <div class="col-md-4">
            <label for="data_entrada" class="form-label">Data de Entrada</label>
            <input type="date" class="form-control" name="data_entrada" required>
        </div>
        <div class="col-md-4">
            <label for="classificacao" class="form-label">Classificação</label>
            <input type="text" class="form-control" name="classificacao" id="classificacao" required>
        </div>
        <div class="col-md-3">
            <label for="data_emissao" class="form-label">Data de Emissão</label>
            <input type="date" class="form-control" name="data_emissao" required>
        </div>
        <div class="col-md-3">
            <label for="proveniencia" class="form-label">Proveniencia</label>
            <input type="text" class="form-control" name="proveniencia" required>
        </div>
        <div class="col-md-4">
            <label for="data_despacho" class="form-label">Data do Despacho</label>
            <input type="date" class="form-control" name="data_despacho" required>
        </div>
        <div class="col-md-6">
            <label for="assunto" class="form-label">Assunto</label>
            <textarea class="form-control" name="assunto" id="textarea" rows="3" required></textarea>
        </div>
        <div class="col-md-4">
            <label for="despacho" class="form-label">Despacho</label>
            <textarea class="form-control" id="textarea" name="despacho" rows="3" required></textarea>
        </div>

        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
    <h2>Tabela de Registos de Notas de Envio</h2>

    <div class="col-md-4">
        <form action="{{route('notas.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table caption-top">

            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Proveniencia</th>
                    <th scope="col">Data de Entrada</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Despacho</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($notas->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->numero }}</td>
                    <td>{{ $nota->proveniencia }}</td>
                    <td>{{ $nota->data_entrada }}</td>
                    <td>{{ $nota->assunto }}</td>
                    @if(($nota->despacho) =='')
                    <td>Pendente</td>
                    @else
                    <td>{{ $nota->despacho }}</td>
                    @endif
                    <td>
                        <a class="btn btn-sm btn-success" href="/nota/edit/{{$nota->id}}">Editar/Despacho</a>
                        <form style="display:inline-block" action="/nota/destroy/{{$nota->id}}" method="POST">
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
            {{ $notas->appends($filters)->links() }}
            @else
            {{ $notas->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
            <p>
                Visualizando {{$notas->count()}} de {{ $notas->total() }} Nota(s).
            </p>


    </div>

</section>
<!-- /.content -->
@endsection