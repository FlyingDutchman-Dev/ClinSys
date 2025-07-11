@extends('adminlte::page')

@section('title', 'Gerenciar Equipe')

@section('content_header')
    <h1>Gerenciar Equipe</h1>
@stop

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.usuarios.create') }}" class="btn btn-success mb-3">Cadastrar Membro</a>

<table id="usuarios-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th></th> {{-- Botão de expandir --}}
            <th>Nome</th>
            <th>E-mail</th>
            <th>Função</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr data-child-content="{!! " <strong>ID:</strong> {$usuario->id}<br><strong>Telefone:</strong> " . ($usuario->telefone ?? 'Não informado') . "<br><a href='"#"' class='btn btn-sm btn-primary'>Editar</a>" !!}">
            <td class="dt-control"></td> {{-- Agora a célula tem a classe que ativa o clique --}}
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ ucfirst($usuario->role) }}</td>
            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

<script>
    $(function() {
        const table = $('#usuarios-table').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
            },
            columnDefs: [{
                className: 'dt-control',
                orderable: false,
                targets: 0
            }],
            order: [
                [1, 'asc']
            ]
        });

        $('#usuarios-table tbody').on('click', 'td.dt-control', function() {
            const tr = $(this).closest('tr');
            const row = table.row(tr);

            if (row.child.isShown()) {
                // Fecha
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Mostra
                const content = tr.attr('data-child-content');
                row.child(content).show();
                tr.addClass('shown');
            }
        });
    });
</script>