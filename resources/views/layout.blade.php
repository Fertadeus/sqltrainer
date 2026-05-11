<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eSQLa</title>

    <style>
        .font-monospace{
            color: green;
            margin-left: 3px;
            margin-right: 3px;
        }

        #tabToggle {
            #tabToggle {
            position: fixed;
            right: 0;
            top: 40%;
            background: #0d6efd;
            color: white;
            padding: 10px 6px;
            cursor: pointer;
            border-radius: 8px 0 0 8px;
            z-index: 1000;

            writing-mode: vertical-rl;
            text-orientation: mixed;
        }
        }

        #tablesDrawer {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background: white;
            box-shadow: -2px 0 5px rgba(0,0,0,0.2);
            transition: right 0.3s ease;
            z-index: 999;
            overflow-y: auto;
        }

        #tablesDrawer.open {
            right: 0;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 rounded-bottom-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">eSQLa</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-lg-start text-end">

                    @auth
                        <li class="nav-item px-2">
                            <a class="nav-link" href="{{ url('/ejercicio') }}">Ejercicios</a>
                        </li>

                       <li class="nav-item px-2">
                            <a href="#" class="nav-link d-flex align-items-center"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

