@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">

    <div class="p-4 bg-white rounded shadow-sm">

        <h3 class="mb-3 text-center">Nueva contraseña</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <!-- TOKEN -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- EMAIL (bloqueado) -->
            <input 
                type="email" 
                name="email" 
                class="form-control mb-3" 
                value="{{ request()->email }}" 
                readonly
            >

            <!-- PASSWORD -->
            <input 
                type="password" 
                name="password" 
                class="form-control mb-3" 
                placeholder="Nueva contraseña"
                required
            >

            <!-- CONFIRM -->
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control mb-3" 
                placeholder="Confirmar contraseña"
                required
            >

            <button class="btn btn-primary w-100">
                Restablecer contraseña
            </button>
        </form>

    </div>

</div>

@endsection