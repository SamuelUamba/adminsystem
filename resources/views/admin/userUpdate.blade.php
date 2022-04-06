@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Actualizar dados do Usuários
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">

    <form class="row g-3 needs-validation" action=" /user/update/{{$users->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">{{ __('Nome do Usuário') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for=" telefone">{{ __('Contacto Telefonico') }}</label>
                <input id="telefone" maxlength="13" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $users->telefone }}" required autocomplete="telefone">
                @error('telefone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="password-confirm">{{ __('Previlégios') }}</label>
                <select class="form-control" id="tipo" name="tipo" required="">
                    @if(($users->tipo)=='administrador')
                    <option value="administrador" selected>Administrador</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="operador">Operador</option>
                    <option value="bloqueado">Bloquear</option>
                    @elseif(($users->tipo)=='supervisor')
                    <option value="supervisor" selected>Supervisor</option>
                    <option value="administrador">Administrador</option>
                    <option value="operador">Operador</option>
                    <option value="bloqueado">Bloquear</option>
                    @elseif(($users->tipo)=='operador')
                    <option value="operador" selected>Operador</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="administrador">Administrador</option>
                    <option value="bloqueado">Bloquear</option>
                    @elseif(($users->tipo)=='bloqueado')
                    <option value="operador">Operador</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="administrador">Administrador</option>
                    <option value="bloqueado" selected>Bloqueado</option>
                    @endif
                </select>
            </div>
        </div>


        <!-- <div class="col-md-5 mb-3">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $users->password }}" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> -->
        <div class="col-md-10 mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Submeter') }}
            </button>
            <button type="reset" class="btn btn-danger">
                <i class="fa fa-ban" aria-hidden="true"></i> {{ __('Cancelar') }}
            </button>
        </div>
    </form>
</div>

@endsection