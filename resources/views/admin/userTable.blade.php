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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="container">

    <div class="col-md-4">
        <form action="{{route('users.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary">Pesquisar</button>
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
                        <a class="btn btn-sm btn-success" href="/user/edit/{{$user->id}}">Editar</a>
                        <form style="display:inline-block" action="/user/destroy/{{$user->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger"> Eliminar</button>
                        </form>
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


</section>
<!-- /.content -->

@endsection