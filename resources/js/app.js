import './bootstrap';
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
