@extends('layout')

@section('content')

<div class="container mt-5" style="max-width: 500px;">

    @auth

        <div class="p-4 bg-white rounded shadow-sm text-center">
            <h2>Bienvenido, {{ $user->name }}</h2>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button class="btn btn-outline-danger">Cerrar sesión</button>
            </form>
        </div>

    @else

        <div class="p-4 bg-white rounded shadow-sm">

            <h3 class="mb-3 text-center">Iniciar sesión</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>

                <button class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
            </div>

        </div>

    @endauth

</div>

@endsection