@extends('layouts.admin')

<!-- Supervisor -->
@if((Auth::user()->tipo)=='supervisor')

@section('content')
@include('supervisor.supervisor')
@endsection
<!-- Administrador -->
@elseif((Auth::user()->tipo)=='administrador')

@section('content')
@include('admin.administrador')
@endsection

@endif