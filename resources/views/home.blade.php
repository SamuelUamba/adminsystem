@extends('layouts.admin')
<!-- Operador -->
@if((Auth::user()->tipo)=='operador')

@section('content')
@include('supervisor.supervisor')
@endsection
<!-- Supervisor -->
@elseif((Auth::user()->tipo)=='supervisor')

@section('content')
@include('supervisor.supervisor')
@endsection
<!-- Administrador -->
@elseif((Auth::user()->tipo)=='administrador')

@section('content')
@include('admin.administrador')
@endsection
<!-- Bloqueado -->
@elseif((Auth::user()->tipo)=='bloqueado')

@section('content')
@include('errors.bloqueado')
@endsection

@endif