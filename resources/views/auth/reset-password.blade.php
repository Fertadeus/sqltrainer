@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">

    <div class="p-4 bg-white rounded shadow-sm">

        <h3 class="mb-3 text-center">Nueva contraseña</h3>

        <p class="text-muted text-center">
            Introduce tu nueva contraseña.
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')
            <!-- Token oculto -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <input 
                type="email" 
                name="email" 
                class="form-control mb-2" 
                placeholder="Email" 
                value="{{ $request->email }}"
                required
            >

            @error('email')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <input 
                type="password" 
                name="password" 
                class="form-control mb-2" 
                placeholder="Nueva contraseña" 
                required
            >

            @error('password')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror

            <!-- Confirmación -->
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control mb-2" 
                placeholder="Confirmar contraseña" 
                required
            >

            <button class="btn btn-primary w-100 mt-2">
                Restablecer contraseña
            </button>

        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Volver al login</a>
        </div>

    </div>

</div>

@endsection