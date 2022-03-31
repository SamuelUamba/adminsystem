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



    <div class="col-md-12">
        <form action="{{route('beneficiarios.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary"><i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
        </form>
        <a href="/exportListaBeneficiarios" class="btn btn-success" style="float: right;">Exportar lista</a>
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
                    <th scope="col">Nome do Mercado</th>
                    <th scope="col">Tipo de Actividade</th>
                    <th scope="col">Ano de Início</th>
                    <th scope="col">Inscrito no INSS</th>

                    <th>Ações</th>
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
                    <td>{{ $beneficiario->nome_mercado }}</td>
                    <td>{{ $beneficiario->tipo_actividade }}</td>
                    <td>{{ $beneficiario->ano_inicio }}</td>
                    @if(($beneficiario->inss)=='1')
                    <td>SIM</td>
                    @else
                    <td>NÃO</td>
                    @endif
                    <td>
                        <a href="/beneficiario/edit/{{$beneficiario->id}}"><i class="fa fa-pencil-square-o fa-2x " aria-hidden="true"></i></a>
                        @if((Auth::user()->tipo)=='administrador')
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$beneficiario->id}}"> <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:red"></i></a>
                        @endif
                        <a href="/pdf/{{$beneficiario->id}}">
                            <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
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
    <!-- Modal -->
    @foreach ($beneficiarios as $beneficiario)
    <form style="display:inline-block" action="{{route('beneficiario.destroy',$beneficiario->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3> Confirma a exclusão do registo?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</section>
<!-- /.content
<script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recipientId = button.data('id');
        console.log(recipientId);

        var modal = $(this);
        modal.find('#dado_id').val(recipientId);
    })
</script> -->
@endsection