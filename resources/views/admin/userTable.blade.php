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
    <!-- @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif -->
    <div class="col-md-4">
        <form action="{{route('users.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Pesquisar...">
            <button type=" submit" id="submit" class="btn btn-primary"><i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Função</th>
                    <th scope="col">Data do Registo</th>
                    <th colspan="3">Operações</th>
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


                    </td>
                    @if(($user->tipo)!='administrador')
                    <td>
                        <form method="POST" action="{{route('users.destroy',$user->id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="show_confirm" data-toggle="tooltip" title='Delete' style="border: none;">
                                <i class="fa fa-trash-o fa-2x" style="color:red;"></i>

                            </button>
                        </form>
                    </td>
                    @endif
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