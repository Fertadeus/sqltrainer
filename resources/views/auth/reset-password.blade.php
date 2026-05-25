{{-- reset-password.blade.php --}}
@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center" style="min-height:80vh; align-items:center;">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

        <div class="esqla-card">

            <div class="text-center mb-4">
                <div style="font-family:var(--font-mono); font-size:1.8rem; font-weight:700; color:var(--accent); letter-spacing:-1px;">&gt; eSQLa</div>
            </div>

            <p class="section-title">nueva contraseña</p>

            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0" style="padding-left:1rem;">
                        @foreach ($errors->all() as $error)
                            <li style="font-size:0.85rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', request()->email) }}"
                        readonly
                        style="opacity:0.6; cursor:not-allowed;"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Confirmar contraseña</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn-accent w-100" style="text-align:center;">Restablecer contraseña</button>
            </form>

        </div>

    </div>
</div>
</div><!-- fin container -->

@endsection