<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Grupo EMI - Iniciar Sesión</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <meta content="Grupo EMI" name="keywords">
    <meta content="Grupo EMI" name="description">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background-color: #f5f5f5;
        }

        .login-container {
            width: 450px;
            padding: 30px;
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-control:focus {
            border-color: #2d79f3;
            box-shadow: 0 0 0 0.2rem rgba(45, 121, 243, 0.25);
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #151717;
            border: none;
        }

        .btn-primary:hover {
            background-color: #252727;
        }

        .google-btn {
            background-color: #fff;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .google-btn:hover {
            border-color: #2d79f3;
        }

        .google-btn svg {
            margin-right: 8px;
        }

        .text-small {
            font-size: 0.9rem;
        }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center align-items-center h-100 p-2">
        <form action="{{ route('admin.login.store') }}" method="POST" class="login-container">
            @csrf

            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo-gremi.jpeg') }}" alt="Logo" class="img-fluid"
                    style="max-width: 150px;">
            </div>

            <h4 class="mb-4 text-center">Iniciar Sesión</h4>

            @include('back.auth.layouts.messages')
            @include('back.auth.layouts.errors')
            @include('back.auth.layouts.error')

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="ejemplo@correo.com" name="email" required
                    autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="••••••••" name="password" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

            <p class="text-center text-small">
                ¿Olvidaste tu contraseña? <a href="{{ route('admin.password.request') }}"
                    class="text-decoration-none text-primary">Recupérala
                    aquí</a>
            </p>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
