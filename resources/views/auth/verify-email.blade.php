@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 600px;">
    <div class="p-4 bg-white rounded shadow-sm text-center">

        <h3 class="mb-3">Verifica tu correo</h3>

        <p>
            Te hemos enviado un email de verificación.
            Por favor, revisa tu bandeja de entrada antes de continuar.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mt-3">
                Se ha enviado un nuevo enlace de verificación.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn btn-primary mt-3">
                Reenviar email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button class="btn btn-outline-danger">
                Cerrar sesión
            </button>
        </form>

    </div>
</div>

@endsection