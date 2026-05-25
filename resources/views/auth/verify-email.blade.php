@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center" style="min-height:80vh; align-items:center;">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

        <div class="esqla-card text-center">

            <!-- Icono -->
            <div style="margin-bottom:1.25rem;">
                <div style="width:56px; height:56px; border-radius:50%; background:rgba(0,229,160,0.1); border:1px solid rgba(0,229,160,0.3); display:inline-flex; align-items:center; justify-content:center; font-size:1.5rem;">
                    ✉
                </div>
            </div>

            <p class="section-title" style="justify-content:center;">verifica tu correo</p>

            <h3 style="font-family:var(--font-mono); font-size:1.1rem; font-weight:700; color:var(--text-primary); margin-bottom:0.75rem;">
                Revisa tu bandeja de entrada
            </h3>

            <p style="color:var(--text-secondary); font-size:0.875rem; margin-bottom:1.5rem; line-height:1.7;">
                Te hemos enviado un email de verificación.<br>
                Por favor, confírmalo antes de continuar.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success mb-3">
                    Se ha enviado un nuevo enlace de verificación.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                @csrf
                <button type="submit" class="btn-accent" style="width:100%; text-align:center;">Reenviar email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-danger-soft">Cerrar sesión</button>
            </form>

        </div>

    </div>
</div>
</div><!-- fin container -->

@endsection