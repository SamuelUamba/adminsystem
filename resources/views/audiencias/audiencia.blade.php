@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="nav-icon far fa-calendar-alt "></i>
                    Audiências
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Audiências</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <form class="row g-3 needs-validation" action="/audiencia/store" method="POST" enctype="multipart/form-data" validate>
        @csrf
        <div class="col-md-4">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" required>
        </div>
        <div class="col-md-3">
            <label for="data_marcacao" class="form-label">Data da Marcação</label>
            <input type="date" class="form-control" name="data_marcacao" required>
        </div>
        <div class="col-md-9">
            <div class="col-md-3">
                <label for="gabinete" class="form-label">Gabinete</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="gabinete" id="btnradio2" required autocomplete="off" value="DDS">
                <label class="btn btn-outline-danger" for="btnradio2">Director Distrital</label>

                <input type="radio" class="btn-check" name="gabinete" id="btnradio1" required autocomplete="off" value="MCD">
                <label class="btn btn-outline-primary" for="btnradio1">Medico Chefe Distrital </label>

                <input type="radio" class="btn-check" name="gabinete" id="btnradio3" required autocomplete="off" value="Outros">
                <label class="btn btn-outline-secondary" for="btnradio3">Outros Gabinetes do SDSMAS </label>

            </div>
        </div>
        <div class="col-md-7">
            <label for="solicitante" class="form-label">Nome do Solicitante</label>
            <input type="text" class="form-control" name="solicitante" required>
        </div>
        <div class="col-md-7">
            <label for="assunto" class="form-label">Assunto</label>
            <textarea class="form-control" name="assunto" rows="3" required></textarea>
        </div>

        <div class="col-md-7">
            <label for="contacto" class="form-label">Contacto</label>
            <input class="form-control" name="contacto"></input>
        </div>
        <div class="content-header col-md-7">
            <button type=" submit" id="submit" class="btn btn-primary">Submeter</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
    <h2>Tabela de Registos de Audiências</h2>
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
                    <th scope="col">Número</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Data da Marcação</th>
                    <th scope="col">Gabinete</th>
                    <th scope="col">Estado</th>
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
                    <td>{{ $audiencia->numero }}</td>
                    <td>{{ $audiencia->solicitante }}</td>
                    <td>{{ $audiencia->assunto }}</td>
                    <td>{{ $audiencia->data_marcacao }}</td>
                    <td>{{ $audiencia->gabinete }}</td>
                    @if(($audiencia->data_atendimento) =='')
                    <td>Pendente</td>
                    @else
                    <td>Atendido</td>
                    @endif

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
                Visualizando {{$audiencias->count()}} de {{ $audiencias->total() }} Pedidos(s).
            </p>


    </div>


</section>
<!-- /.content -->
@endsection