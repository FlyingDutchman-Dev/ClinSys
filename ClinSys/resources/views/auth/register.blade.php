@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('body')

<body class="hold-transition register-page" style="height: 100vh;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="register-box">
            <div class="register-logo">
                <img src="{{ asset('images/logo-clinsys.png') }}" alt="ClinSys" style="width: 180px;">
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Registrar uma nova conta</p>

                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nome completo" value="{{ old('name') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Senha" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a senha" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <a href="{{ route('login') }}" class="text-center">Já tenho uma conta</a>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stop