@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">

    <div class="p-4 bg-white rounded shadow-sm">

        <h3 class="mb-3 text-center">Nueva contraseña</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- IMPORTANTE: action -> password.store  y  method -> POST --}}
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- TOKEN -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- EMAIL (bloqueado, pre-rellenado desde el enlace del email) -->
            <input
                type="email"
                name="email"
                class="form-control mb-3"
                value="{{ old('email', request()->email) }}"
                readonly
            >

            <!-- PASSWORD -->
            <input
                type="password"
                name="password"
                class="form-control mb-3"
                placeholder="Nueva contraseña"
                required
                autocomplete="new-password"
            >

            <!-- CONFIRM -->
            <input
                type="password"
                name="password_confirmation"
                class="form-control mb-3"
                placeholder="Confirmar contraseña"
                required
                autocomplete="new-password"
            >

            <button class="btn btn-primary w-100">
                Restablecer contraseña
            </button>
        </form>

    </div>

</div>

@endsection
