<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    <style>
        .register-form {
            max-width: 400px;
            margin: 50px auto;
        }
        .register-form h2 {
            margin-bottom: 20px;
        }
        .register-form input {
            margin-bottom: 10px;
        }
        .register-form button {
            width: 100%;
        }
        .register-form .logo{
            text-align: center;
        }
        .register-form .logo img{
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-form">
            <div class="logo">
                <img src="{{ asset('assets/logo-amazon.png') }}" alt="Logo">
            </div>
            <form id="registerForm" class="border rounded-1 m-3 p-3">
                @csrf
                <h2>Crear cuenta</h2>
                <div class="form-group">
                    <label for="name">Tu nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Debe tener al menos 6 caracteres" required minlength="6">
                    <small class="form-text text-muted">La contraseña debe tener al menos 6 caracteres.</small>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Vuelve a escribir la contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required minlength="6">
                </div>
                <button type="submit" class="btn btn-primary">Crear tu cuenta de Amazon</button>
                <p class="mt-3">Al crear una cuenta, aceptas las <a href="#">Condiciones de Uso</a> y el <a href="#">Aviso de Privacidad de Amazon</a>.</p>
                <p><a href="#">¿Ya tienes una cuenta? Iniciar sesión</a></p>
            </form>
        </div>
    </div>

    <a target="_blank" href="https://icons8.com/icon/R3SjD8mgrmca/amazon">Amazonas</a> icono de <a target="_blank" href="https://icons8.com">Icons8</a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#registerForm').on('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            $.ajax({
                url: '/register',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: `Registro exitoso!`,
                        text: response.statusText,
                        icon: 'success',
                        confirmButtonText: 'Ok!',
                        confirmButtonColor: '#28a745'
                    })
                },
                error: function(error) {
                    let message
                    if(error.status === 422) message = 'Las contraseñas no coinciden'
                    else message = error.statusText

                    Swal.fire({
                        title: `Error ${error.status} !`,
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'Ok!',
                        confirmButtonColor: '#3085d6'
                    })
                }
            });
        });
    </script>
</body>
</html>
