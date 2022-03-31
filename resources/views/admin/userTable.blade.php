@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-list"></i>
                    Lista dos Usuários
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Lista de usuários</li>
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
    <div class="col-md-4">
        <form action="{{route('users.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary"><i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
        </form>
    </div>
    @if(session('status'))
    <div class="alert alert-sucess">
        {{ session('status') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Função</th>
                    <th scope="col">Data do Registo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count()==0)
                <tr>
                    <td colspan="5">Sem dados registados para visaualizacão!</td>
                </tr>
                @endif
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tipo }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="/user/edit/{{$user->id}}"><i class="fa fa-pencil-square-o fa-2x " aria-hidden="true"></i></a>
                        @if(($user->tipo)!='administrador')
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$user->id}}"> <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:red"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>
            @if(isset($filters))
            {{ $users->appends($filters)->links() }}
            @else
            {{ $users->links() }}
            @endif
            </spa>
            <style>
                .w-5 {
                    display: none;
                }
            </style>



    </div>
    <!-- Modal -->
    @foreach ($users as $user)
    <form style="display:inline-block" action="{{route('users.destroy',$user->id)}}" method="POST">
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
<!-- /.content -->

@endsection