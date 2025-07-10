@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - ClinSys</h1>
@stop

@section('content')
    <p>Bem-vindo ao painel do ClinSys, {{ Auth::user()->name }}!</p>

    @if (Auth::user()->role === 'admin')
        <div class="card">
            <div class="card-body">
                <h3>Equipe</h3>
                <p>Aqui você pode gerenciar os usuários do sistema:</p>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-users-cog"></i> Gerenciar Equipe
                </a>
            </div>
        </div>
    @endif
@stop
