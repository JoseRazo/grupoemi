<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer Contraseña - Grupo EMI</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background-color: #f5f5f5;
        }

        .reset-container {
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

        .text-small {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center h-100 p-2">
        <div class="reset-container text-center">

            <div class="mb-4">
                <img src="{{ asset('assets/images/logo-gremi.jpeg') }}" alt="Logo" class="img-fluid"
                    style="max-width: 150px;">
            </div>

            <h4 class="mb-3">¿Olvidaste tu contraseña?</h4>
            <p class="text-muted mb-4">Ingresa tu correo electrónico y te enviaremos<br class="d-sm-none"> un enlace
                para restablecer tu contraseña.</p>

            @include('back.auth.layouts.messages')
            @include('back.auth.layouts.errors')
            @include('back.auth.layouts.error')

            <form action="{{ route('admin.password.email') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="ejemplo@correo.com" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary text-center w-100">
                        Enviar
                    </button>
                </div>
                <a href="{{ route('admin.login') }}" class="text-decoration-none text-primary text-small">Cancelar y
                    volver al login</a>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
