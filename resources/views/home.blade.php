@extends('layout')

@section('content')

<div class="container mt-5">

    @auth

        <h2 class="text-center mb-4">Bienvenido, {{ $user->name }}</h2>

        <div class="row g-4">

        <!-- EJERCICIOS -->
        <div class="col-12 col-md-4">
            <div class="p-4 bg-white rounded shadow-sm text-center h-100">
                <h5>Ejercicios</h5>
                <p>Practica SQL mediante ejercicios guiados.</p>

                <a href="{{ url('/ejercicio') }}" class="btn btn-primary">
                    Ir a ejercicios
                </a>
            </div>
        </div>

        <!-- MODO LIBRE -->
        <div class="col-12 col-md-4">
            <div class="p-4 bg-white rounded shadow-sm text-center h-100">
                <h5>Modo libre</h5>
                <p>Realiza consultas SQL sin restricciones.</p>

                <a href="{{ route('free') }}" class="btn btn-success">
                    Ir a modo libre
                </a>
            </div>
        </div>

        
        <!-- LOGOUT -->
        <div class="col-12 col-md-4">
            <div class="p-4 bg-white rounded shadow-sm text-center h-100">
                <h5>Sesión</h5>
                <p>¿Quieres salir de tu cuenta?</p>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button class="btn btn-outline-danger">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>

    @else

        <div class="p-4 bg-white rounded shadow-sm">

            <h3 class="mb-3 text-center">Iniciar sesión</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>

                <button class="btn btn-primary w-100">Entrar</button>
                <div class="mt-3 text-center">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
            </div>

        </div>

    @endauth

</div>

@endsection