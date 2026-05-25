@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">

    @auth

        <!-- WELCOME HEADER -->
        <div class="mb-5" style="animation-delay:0.05s">
            <h1 style="font-family: var(--font-mono); font-size: clamp(1.6rem,4vw,2.4rem); font-weight:700; color: var(--text-primary); margin-bottom:0.25rem;">
                Hola, <span style="color:var(--accent)">{{ $user->name }}</span>
            </h1>
            <p style="color: var(--text-secondary); margin-top:0.4rem; font-size:0.95rem;">
                ¿Qué quieres practicar hoy?
            </p>
        </div>

        <!-- CARDS ROW -->
        <div class="row g-4" style="animation-delay:0.12s">

            <!-- EJERCICIOS -->
            <div class="col-12 col-md-4">
                <div class="esqla-card h-100 d-flex flex-column" style="border-top: 3px solid var(--accent);">
                   
                    <h5 style="font-family:var(--font-mono); font-weight:700; color:var(--text-primary); margin-bottom:0.5rem;">Ejercicios</h5>
                    <p class="mt-3" style="color:var(--text-secondary); font-size:0.875rem; flex:1;">
                        Practica SQL paso a paso con ejercicios guiados y comprueba tus respuestas al instante.
                    </p>
                    <div class="mt-3">
                        <a href="{{ url('/ejercicio') }}" class="btn-accent">Ir a ejercicios</a>
                    </div>
                </div>
            </div>

            <!-- MODO LIBRE -->
            <div class="col-12 col-md-4">
                <div class="esqla-card h-100 d-flex flex-column" style="border-top: 3px solid var(--accent-yellow);">

                    <h5 style="font-family:var(--font-mono); font-weight:700; color:var(--text-primary); margin-bottom:0.5rem;">Modo libre</h5>
                    <p class="mt-3" style="color:var(--text-secondary); font-size:0.875rem; flex:1;">
                        Lanza consultas SQL sin restricciones. ¡Ideal para experimentar!
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('free') }}" class="btn-outline-accent">Ir a modo libre</a>
                    </div>
                </div>
            </div>

            <!-- SESIÓN -->
            <div class="col-12 col-md-4">
                <div class="esqla-card h-100 d-flex flex-column" style="border-top: 3px solid var(--accent-red);">

                    <h5 style="font-family:var(--font-mono); font-weight:700; color:var(--text-primary); margin-bottom:0.5rem;">Sesión</h5>
                    <p class="mt-3" style="color:var(--text-secondary); font-size:0.875rem; flex:1;">
                        ¿Quieres cerrar tu sesión actual? Puedes volver cuando quieras.
                    </p>
                    <div class="mt-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn-danger-soft">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    @else

        <!-- LOGIN FORM -->
        <div class="row justify-content-center" style="min-height: 80vh; align-items: center;">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5">

                <div class="esqla-card">

                    <!-- LOGO / BRAND -->
                    <div class="text-center mb-4">
                        <div style="font-family:var(--font-mono); font-size:1.8rem; font-weight:700; color:var(--accent); letter-spacing:-1px;">
                            &gt; eSQLa
                        </div>
                        <p style="color:var(--text-muted); font-size:0.82rem; margin-top:0.3rem;">
                            Aprende SQL de forma práctica
                        </p>
                    </div>

                    <p class="section-title">iniciar sesión</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="tu@email.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>

                        <button type="submit" class="btn-accent w-100" style="text-align:center;">Entrar</button>

                        <div class="mt-3 text-center" style="font-size:0.82rem;">
                            <a href="{{ route('password.request') }}" style="color:var(--text-muted);">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>

                    <hr style="border-color:var(--border); margin: 1.5rem 0;">

                    <div class="text-center" style="font-size:0.85rem; color:var(--text-secondary);">
                        ¿No tienes cuenta?&nbsp;
                        <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>

                </div>

            </div>
        </div>

    @endauth

</div>
</div>
</div><!-- fin container -->

@endsection