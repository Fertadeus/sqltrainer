@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center" style="min-height:80vh; align-items:center;">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

        <div class="esqla-card">

            <div class="text-center mb-4">
                <div style="font-family:var(--font-mono); font-size:1.8rem; font-weight:700; color:var(--accent); letter-spacing:-1px;">&gt; eSQLa</div>
                <p style="color:var(--text-muted); font-size:0.82rem; margin-top:0.3rem;">Crea tu cuenta</p>
            </div>

            <p class="section-title">registro</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Tu nombre"
                        required
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="tu@email.com"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Confirmar contraseña</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-accent w-100" style="text-align:center;">Crear cuenta</button>
            </form>

            <hr style="border-color:var(--border); margin:1.5rem 0;">

            <div class="text-center" style="font-size:0.85rem; color:var(--text-secondary);">
                ¿Ya tienes cuenta?&nbsp;
                <a href="{{ route('login') }}">Inicia sesión</a>
            </div>

        </div>

    </div>
</div>
</div>

@endsection