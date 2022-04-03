@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fa fa-table fa-1x" aria-hidden="true"></i>
                    Lista de Mercados
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



    <div class="col-md-4">
        <form action="{{route('mercados.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary"><i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table caption-top">

            <thead>
                <tr>
                    <th scope="col">Nome do Mercado</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Localização</th>
                    <th colspan="3">Operações</th>

                </tr>
            </thead>
            <tbody>
                @if($mercados->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($mercados as $mercado)
                <tr>
                    <td>{{ $mercado->nome_mercado }}</td>
                    @if(($mercado->tipo)=='1')
                    <td>Grossista</td>
                    @else
                    <td>Não Grossista</td>
                    @endif

                    <td>{{ $mercado->cidade }}</td>

                    <td>
                        <a href="/mercados/edit/{{$mercado->id}}"><i class="fa fa-pencil-square-o fa-2x " aria-hidden="true" title='edit'></i></a>

                    </td>
                    <td>
                        <form method="POST" action="{{ route('mercado.destroy', $mercado->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="show_confirm" data-toggle="tooltip" title='Delete' style="border: none;">
                                <i class="fa fa-trash-o fa-2x" style="color:red;"></i>

                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>
            @if(isset($filters))
            {{ $mercados->appends($filters)->links() }}
            @else
            {{ $mercados->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>
            <p>
                Visualizando {{$mercados->count()}} de {{ $mercados->total() }} Registo(s).
            </p>


    </div>
    <!-- Modal -->



</section>
<!-- /.content -->
@endsection