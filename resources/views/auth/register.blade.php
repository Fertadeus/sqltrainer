@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">
    <div class="p-4 bg-white rounded shadow-sm">

        <h3 class="mb-4 text-center">Registro</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirmar contraseña</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                    required
                >
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <button class="btn btn-primary w-100">
                Registrarse
            </button>

        </form>

        <!-- Link login -->
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">
                ¿Ya tienes cuenta? Inicia sesión
            </a>
        </div>

    </div>
</div>

@endsection