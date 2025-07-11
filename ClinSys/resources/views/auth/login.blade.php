@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('body')

<body class="hold-transition login-page" style="height: 100vh;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="login-box">

            <div class="login-logo">
                <img src="{{ asset('images/logo-clinsys.png') }}" alt="ClinSys" style="width: 180px;">
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Faça login para iniciar sua sessão</p>

                    {{-- Aqui só deixamos o Blade preparando a condição --}}
                    @if ($errors->any())
                    {{-- Toast será disparado via JS abaixo --}}
                    @endif

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Senha" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">Lembrar-me</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                        </div>
                    </form>

                    <p class="mb-1 mt-2">
                        <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Registrar uma nova conta</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('adminlte_js')

    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(function() {
            // Mostra o primeiro erro com Toastr
            @if($errors -> any())
            toastr.error("{{ addslashes($errors->first()) }}", "Ooops!", {
                closeButton: true,
                progressBar: true,
                timeOut: 5000,
            });
            @endif

            // Se houver erros de validação, dispara um Toast SWEETLAERT do AdminLTE
            /*
            @if($errors -> any())
            $(document).Toasts('create', {
                class: 'bg-danger', // fundo vermelho
                autohide: true,
                delay: 3000,
                title: 'Erro',
                body: '{{ addslashes($errors->first()) }}'
            });
            @endif
            */

            // Exemplo: criar Toast de sucesso manualmente
            $('.toastrDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    autohide: true,
                    delay: 3000,
                    body: 'Operação realizada com sucesso!'
                });
            });
        });
    </script>

    @stop