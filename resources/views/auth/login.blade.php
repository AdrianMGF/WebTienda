@extends('templates.master')

@section('content-center')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center"> <!-- Añadida la clase align-items-center -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Mantener el slot para el logo existente -->
                    <x-slot name="logo">
                        <x-authentication-card-logo />
                    </x-slot>

                    <x-validation-errors class="mb-4" />

                    <!-- Título "Iniciar Sesión" -->
                    <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('auth.Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('auth.Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-muted me-4">{{ __('auth.Forgot your password?') }}</a>
                            @endif

                            <button type="submit" class="btn btn-primary">{{ __('auth.Log in') }}</button>

                            <a href="{{ route('register') }}" class="btn btn-secondary" style="margin-right: 5px;">{{ __('Registarse') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center"> <!-- Añadida la clase text-center -->
            <img class="img-fluid mb-4" src="/img/loginImage.jpg" alt="Imagen de una carta" width="300">
        </div>
    </div>
</div>

@endsection