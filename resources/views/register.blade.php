@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')
    <div class="register-form">
        <div class="logo">
            <img src="{{ asset('assets/logo-amazon.png') }}" alt="Logo">
        </div>
        <form id="registerForm" class="border rounded-1 m-3 px-4 py-3">
            @csrf
            <h2>Crear cuenta</h2>
            <div class="form-group">
                <label for="name">Tu nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Debe tener al menos 6 caracteres" required minlength="6" style="margin-bottom: 0px !important;">
                <small class="form-text text-muted"><img src="{{ asset('assets/icono-info.png') }}" class="me-1" alt="Logo" width="15px">La contraseña debe tener al menos seis caracteres.</small>
            </div>
            <div class="form-group mt-2">
                <label for="password_confirmation">Vuelve a escribir la contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required minlength="6">
            </div>
            <button type="submit">Crear tu cuenta de Amazon</button>
            <p class="mt-3 policies">Al crear una cuenta, aceptas las <a href="#">Condiciones de Uso</a> y el <a href="#">Aviso de Privacidad</a> de Amazon.</p>
            <hr>
            <p>¿Ya tienes una cuenta? <a href="#" class="text-decoration-none">Iniciar sesión <img src="{{ asset('assets/arrow-right.png') }} " width="6px"></a></p>
        </form>
    </div>
@endsection
