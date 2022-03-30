@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fa fa-table fa-1x" aria-hidden="true"></i>
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



    <div class="col-md-12">
        <form action="{{route('beneficiarios.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <a href="/exportListaBeneficiarios" class="btn btn-success" style="float: right;">Exportar PDF</a>
    </div>
    @if(session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
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
                    <th scope="col">Inscrito no INSS</th>

                    <th>Ações</th>
                    <th scope="col">Comprovativo</th>
                </tr>
            </thead>
            <tbody>
                @if($beneficiarios->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($beneficiarios as $beneficiario)
                <tr>
                    <td>{{ $beneficiario->nome }}</td>
                    <td>{{ $beneficiario->genero }}</td>
                    <td>{{ $beneficiario->data_nascimento }}</td>
                    <td>{{ $beneficiario->nome_mercado }}</td>
                    <td>{{ $beneficiario->tipo_actividade }}</td>
                    <td>{{ $beneficiario->ano_inicio }}</td>
                    @if(($beneficiario->inss)=='1')
                    <td>SIM</td>
                    @else
                    <td>NÃO</td>
                    @endif
                    <td>

                        <a class="btn btn-sm btn-success" href="/beneficiario/edit/{{$beneficiario->id}}">Editar</a>

                        @if((Auth::user()->tipo)!='operador')

                        <form style="display:inline-block" action="/beneficiario/destroy/{{$beneficiario->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger"> Delete</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        <a href="/pdf/{{$beneficiario->id}}" class="btn btn-primary">
                            Imprimir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>
            @if(isset($filters))
            {{ $beneficiarios->appends($filters)->links() }}
            @else
            {{ $beneficiarios->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
            <p>
                Visualizando {{$beneficiarios->count()}} de {{ $beneficiarios->total() }} Registo(s).
            </p>


    </div>


</section>
<!-- /.content -->
@endsection