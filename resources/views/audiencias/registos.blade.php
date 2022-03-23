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



    <div class="col-md-4">
        <form action="{{route('audiencias.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table caption-top">

            <thead>
                <tr>
                    <th scope="col">Nome do Beneficiário</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Nome do Mercado</th>
                    <th scope="col">Tipo de Actividade</th>
                    <th scope="col">Ano de Início</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($audiencias->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($audiencias as $audiencia)
                <tr>
                    <td>{{ $audiencia->nome }}</td>
                    <td>{{ $audiencia->genero }}</td>
                    <td>{{ $audiencia->data_nascimento }}</td>
                    <td>{{ $audiencia->nome_mercado }}</td>
                    <td>{{ $audiencia->tipo_actividade }}</td>
                    <td>{{ $audiencia->ano_inicio }}</td>


                    <td>
                        <a class="btn btn-sm btn-success" href="/audiencia/edit/{{$audiencia->id}}">Editar/Desfecho</a>
                        <form style="display:inline-block" action="/audiencia/destroy/{{$audiencia->id}}" method="POST">
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
            {{ $audiencias->appends($filters)->links() }}
            @else
            {{ $audiencias->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
            <p>
                Visualizando {{$audiencias->count()}} de {{ $audiencias->total() }} Registo(s).
            </p>


    </div>


</section>
<!-- /.content -->
@endsection