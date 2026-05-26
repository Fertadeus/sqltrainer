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

                    {{--
                        LoginRequest lanza el error siempre sobre 'email':
                        - Credenciales incorrectas → trans('auth.failed')
                        - Rate limit activo      → trans('auth.throttle', [...])
                        Distinguimos comprobando si el mensaje contiene 'seconds' o 'minutes',
                        que son los placeholders de auth.throttle.
                    --}}
                    @php
                        $emailError   = $errors->first('email');
                        $isThrottled  = $emailError && (
                                            str_contains($emailError, 'segundo') ||
                                            str_contains($emailError, 'minuto')  ||
                                            str_contains($emailError, 'second')  ||
                                            str_contains($emailError, 'minute')
                                        );

                        // Extraer los segundos del mensaje si está bloqueado
                        $lockSeconds = 0;
                        if ($isThrottled) {
                            preg_match('/(\d+)\s*(segundo|second)/', $emailError, $m);
                            $lockSeconds = isset($m[1]) ? (int) $m[1] : 60;
                        }
                    @endphp

                    {{-- Error de credenciales --}}
                    @if ($emailError && !$isThrottled)
                        <div class="login-alert login-alert--error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            Los datos introducidos no son correctos.
                        </div>
                    @endif

                    {{-- Cooldown activo --}}
                    @if ($isThrottled)
                        <div class="login-alert login-alert--locked" id="lockAlert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Demasiados intentos. Espera <span id="cooldown-timer">{{ $lockSeconds }}</span> segundos.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="tu@email.com"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="••••••••"
                                required
                            >
                        </div>

                        <button
                            type="submit"
                            class="btn-accent w-100"
                            style="text-align:center;"
                            id="submitBtn"
                            {{ $isThrottled ? 'disabled' : '' }}
                        >
                            Entrar
                        </button>

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

{{-- Los estilos y el script solo son relevantes en el @else, pero los ponemos fuera
     del bloque @auth para no mezclar HTML estructural con lógica de autenticación.
     La variable $isThrottled se inicializa a false por si el bloque @auth está activo. --}}
@php $isThrottled = $isThrottled ?? false; $lockSeconds = $lockSeconds ?? 0; @endphp

<style>
.login-alert {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.65rem 0.9rem;
    border-radius: 6px;
    font-size: 0.82rem;
    margin-bottom: 1rem;
    font-family: var(--font-mono, monospace);
}
.login-alert--error {
    background: rgba(220, 53, 69, 0.1);
    border: 1px solid rgba(220, 53, 69, 0.35);
    color: #e07080;
}
.login-alert--locked {
    background: rgba(255, 193, 7, 0.08);
    border: 1px solid rgba(255, 193, 7, 0.35);
    color: #c9a227;
}
#submitBtn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
    pointer-events: none;
}
</style>

@if ($isThrottled)
<script>
(function () {
    const timerEl   = document.getElementById('cooldown-timer');
    const submitBtn = document.getElementById('submitBtn');
    let seconds = {{ $lockSeconds }};

    const interval = setInterval(function () {
        seconds--;
        if (seconds <= 0) {
            clearInterval(interval);
            timerEl.textContent = '0';
            submitBtn.removeAttribute('disabled');
            document.getElementById('lockAlert').style.display = 'none';
        } else {
            timerEl.textContent = seconds;
        }
    }, 1000);
})();
</script>
@endif

@endsection