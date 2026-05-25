<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>eSQLa</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg-base:       #0d0f14;
            --bg-surface:    #13161e;
            --bg-elevated:   #1a1e2a;
            --bg-card:       #1e2330;
            --border:        #2a2f3d;
            --border-bright: #3a4057;
            --accent:        #00e5a0;
            --accent-dim:    #00b87c;
            --accent-glow:   rgba(0,229,160,0.15);
            --accent-red:    #ff5f5f;
            --accent-yellow: #ffc947;
            --text-primary:  #e8eaf0;
            --text-secondary:#8b90a0;
            --text-muted:    #565c72;
            --font-mono:     'Space Mono', monospace;
            --font-sans:     'DM Sans', sans-serif;
            --radius:        10px;
            --radius-lg:     16px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        html, body {
            background-color: var(--bg-base);
            color: var(--text-primary);
            font-family: var(--font-sans);
            font-size: 15px;
            line-height: 1.65;
            min-height: 100vh;
        }

        /* ── NOISE OVERLAY ── */
        /* Nota: NO usar z-index aquí para no crear un stacking context
           que atraparía los modales de Bootstrap dentro del body */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            opacity: 0.4;
        }

        /* ── NAVBAR ── */
        .esqla-nav {
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border);
            padding: 0.6rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .esqla-nav .navbar-brand {
            font-family: var(--font-mono);
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--accent) !important;
            letter-spacing: -0.5px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .esqla-nav .navbar-brand::before {
            content: '>';
            color: var(--text-muted);
            font-size: 1rem;
        }

        .esqla-nav .nav-link {
            color: var(--text-secondary) !important;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.4rem 0.85rem !important;
            border-radius: var(--radius);
            transition: color 0.2s, background 0.2s;
            text-decoration: none;
        }

        .esqla-nav .nav-link:hover {
            color: var(--text-primary) !important;
            background: var(--bg-elevated);
        }

        .esqla-nav .nav-link.nav-link-logout {
            color: var(--accent-red) !important;
        }

        .esqla-nav .nav-link.nav-link-logout:hover {
            background: rgba(255,95,95,0.1);
        }

        .navbar-toggler {
            border: 1px solid var(--border-bright);
            border-radius: var(--radius);
            padding: 5px 8px;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28139,144,160,1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* ── MAIN CONTENT ── */
        .esqla-content {
            padding: 2rem 1rem;
        }

        /* ── CARDS ── */
        .esqla-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 2rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .esqla-card:hover {
            border-color: var(--border-bright);
        }

        /* ── BUTTONS ── */
        .btn-accent {
            background: var(--accent);
            color: #0d0f14;
            border: none;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 0.55rem 1.3rem;
            border-radius: var(--radius);
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-accent:hover {
            background: #00ffb3;
            box-shadow: 0 0 16px var(--accent-glow);
            transform: translateY(-1px);
            color: #0d0f14;
        }

        .btn-accent:active { transform: translateY(0); }

        .btn-outline-accent {
            background: transparent;
            color: var(--accent-yellow);
            border: 1px solid var(--accent-yellow);
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.55rem 1.3rem;
            border-radius: var(--radius);
            transition: background 0.2s, box-shadow 0.2s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-accent:hover {
            background: rgba(231, 255, 95, 0.1);
            box-shadow: 0 0 12px rgba(244, 255, 95, 0.1);
            color: var(--accent-yellow);
        }

        .btn-danger-soft {
            background: transparent;
            color: var(--accent-red);
            border: 1px solid var(--accent-red);
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.55rem 1.3rem;
            border-radius: var(--radius);
            transition: background 0.2s;
            cursor: pointer;
            width: 100%;
        }

        .btn-danger-soft:hover {
            background: rgba(255,95,95,0.1);
            color: var(--accent-red);
        }

        .btn-neutral {
            background: var(--bg-elevated);
            color: var(--text-secondary);
            border: 1px solid var(--border);
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.55rem 1.3rem;
            border-radius: var(--radius);
            transition: background 0.2s, color 0.2s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-neutral:hover {
            background: var(--border);
            color: var(--text-primary);
        }

        /* ── FORM CONTROLS ── */
        .form-control, .form-control:focus {
            background: var(--bg-elevated);
            border: 1px solid var(--border);
            color: var(--text-primary);
            border-radius: var(--radius);
            padding: 0.65rem 1rem;
            font-family: var(--font-sans);
            font-size: 0.9rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
            background: var(--bg-elevated);
            color: var(--text-primary);
        }

        .form-control::placeholder { color: var(--text-muted); }

        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 0.4rem;
        }

        textarea.form-control {
            font-family: var(--font-mono);
            font-size: 0.85rem;
            resize: vertical;
            line-height: 1.7;
        }

        /* ── ALERTS ── */
        .alert-success {
            background: rgba(0,229,160,0.1);
            border: 1px solid rgba(0,229,160,0.3);
            color: var(--accent);
            border-radius: var(--radius);
        }

        .alert-danger {
            background: rgba(255,95,95,0.1);
            border: 1px solid rgba(255,95,95,0.3);
            color: var(--accent-red);
            border-radius: var(--radius);
        }

        /* ── TABLES ── */
        .table {
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .table th {
            background: var(--bg-elevated);
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            border-color: var(--border);
            font-weight: 700;
        }

        .table td {
            border-color: var(--border);
            vertical-align: middle;
        }

        .table-striped > tbody > tr:nth-of-type(odd) > td {
            background: rgba(255,255,255,0.02);
        }

        .table-bordered { border-color: var(--border); }

        /* ── MODALS ── */
        .modal-content {
            background: var(--bg-card);
            border: 1px solid var(--border-bright);
            border-radius: var(--radius-lg);
            color: var(--text-primary);
        }

        .modal-header {
            border-bottom: 1px solid var(--border);
            padding: 1.25rem 1.5rem;
        }

        .modal-header .modal-title {
            font-family: var(--font-mono);
            color: var(--accent);
            font-size: 1rem;
        }

        .modal-body { padding: 1.5rem; color: var(--text-secondary); }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1rem 1.5rem;
        }

        .modal-backdrop { background: rgba(0,0,0,0.7); }

        /* ── SIDE DRAWER ── */
        #tabToggle {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            background: var(--accent);
            color: #0d0f14;
            padding: 12px 6px;
            cursor: pointer;
            border-radius: 8px 0 0 8px;
            z-index: 1000;
            transition: background 0.2s;
            box-shadow: -4px 0 16px rgba(0,229,160,0.2);
        }

        #tabToggle:hover { background: #00ffb3; }

        #tabText {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            font-family: var(--font-mono);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #tablesDrawer {
            position: fixed;
            top: 0;
            right: -320px;
            width: 320px;
            height: 100%;
            background: var(--bg-surface);
            border-left: 1px solid var(--border);
            box-shadow: none;
            transition: right 0.3s cubic-bezier(0.4,0,0.2,1),
                        box-shadow 0.3s ease,
                        visibility 0s linear 0.3s;
            z-index: 999;
            overflow-y: auto;
            visibility: hidden;
        }

        #tablesDrawer.open {
            right: 0;
            box-shadow: -8px 0 32px rgba(0,0,0,0.4);
            visibility: visible;
            transition: right 0.3s cubic-bezier(0.4,0,0.2,1),
                        box-shadow 0.3s ease,
                        visibility 0s linear 0s;
        }

        #tablesDrawer h5 {
            font-family: var(--font-mono);
            font-size: 0.85rem;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1.2rem 1.2rem 1rem;
            border-bottom: 1px solid var(--border);
            margin: 0;
        }

        #tablesContent { padding: 1rem 1.2rem; }

        #tablesContent .badge {
            background: var(--bg-elevated) !important;
            color: var(--text-secondary) !important;
            border: 1px solid var(--border);
            font-family: var(--font-mono);
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 4px;
            margin: 2px;
        }

        #tablesContent strong {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--accent);
            display: block;
            margin-bottom: 6px;
        }

        #tablesContent .mb-3 {
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 1rem !important;
        }

        /* ── LINKS ── */
        a { color: var(--accent); text-decoration: none; transition: color 0.2s; }
        a:hover { color: #00ffb3; }

        /* ── INVALID FEEDBACK ── */
        .invalid-feedback { font-size: 0.8rem; color: var(--accent-red); }
        .is-invalid { border-color: var(--accent-red) !important; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-base); }
        ::-webkit-scrollbar-thumb { background: var(--border-bright); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--text-muted); }

        /* ── SECTION HEADINGS ── */
        .section-title {
            font-family: var(--font-mono);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── PAGE ENTRY ANIMATION ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .esqla-content > * {
            animation: fadeUp 0.35s ease both;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .esqla-card { padding: 1.25rem; }
            .esqla-content { padding: 1rem 0.5rem; }
            #tablesDrawer { width: 90vw; right: -90vw; }
            #tablesDrawer.open { right: 0; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="esqla-nav navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">eSQLa</a>

            @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-lg-start text-end align-items-lg-center">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/ejercicio') }}">Ejercicios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('free') }}">Modo libre</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            @endauth
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="esqla-content">
        @yield('content')
    </div>

    <!-- Slot opcional para elementos fixed fuera del container (ej: drawer en show.blade) -->
    @yield('fixed')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>