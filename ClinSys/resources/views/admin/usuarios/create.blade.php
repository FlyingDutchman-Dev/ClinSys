@extends('adminlte::page')

@section('title', 'Cadastrar Membro')

@section('content_header')
    <h1>Cadastrar Membro da Equipe</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.usuarios.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="role">Função</label>
        <select name="role" class="form-control" required>
            <option value="">-- Selecione --</option>
            <option value="profissional">Profissional</option>
            <option value="recepcionista">Recepcionista</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirme a Senha</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

@stop
