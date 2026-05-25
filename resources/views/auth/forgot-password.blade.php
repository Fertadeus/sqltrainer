{{-- forgot-password.blade.php --}}
@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center" style="min-height:80vh; align-items:center;">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

        <div class="esqla-card">

            <div class="text-center mb-4">
                <div style="font-family:var(--font-mono); font-size:1.8rem; font-weight:700; color:var(--accent); letter-spacing:-1px;">&gt; eSQLa</div>
            </div>

            <p class="section-title">recuperar contraseña</p>

            <p style="color:var(--text-secondary); font-size:0.85rem; margin-bottom:1.25rem; text-align:center;">
                Introduce tu email y te enviaremos un enlace para restablecer tu contraseña.
            </p>

            @if (session('status'))
                <div class="alert alert-success mb-3">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="tu@email.com" required>
                    @error('email')
                        <div style="color:var(--accent-red); font-size:0.8rem; margin-top:4px;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-accent w-100" style="text-align:center;">Enviar enlace</button>
            </form>

            <div class="text-center mt-3" style="font-size:0.82rem;">
                <a href="{{ route('login') }}" style="color:var(--text-muted);">← Volver al login</a>
            </div>

        </div>

    </div>
</div>
</div><!-- fin container -->

@endsection