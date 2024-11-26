<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

    <!-- General Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="login-container">
        <div class="login-content">
            <p class="text-center">
                <i class="fas fa-user-circle fa-5x"></i>
            </p>
            <p class="text-center">
                Inicia sesión con tu cuenta
            </p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="bmd-label-floating">
                        <i class="fas fa-user-secret"></i> &nbsp; Correo electrónico
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="bmd-label-floating">
                        <i class="fas fa-key"></i> &nbsp; Contraseña
                    </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-login text-center">INICIAR SESIÓN</button>
            </form>
        </div>
    </div>

    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').bootstrapMaterialDesign();
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
