@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">

    <div class="p-4 bg-white rounded shadow-sm">

        <h3 class="mb-3 text-center">Recuperar contraseña</h3>

        <p class="text-muted text-center">
            Introduce tu email y te enviaremos un enlace para restablecer tu contraseña.
        </p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <input 
                type="email" 
                name="email" 
                class="form-control mb-2" 
                placeholder="Email" 
                required
            >

            @error('email')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror

            <button class="btn btn-primary w-100">
                Enviar enlace
            </button>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Volver al login</a>
        </div>

    </div>

</div>

@endsection