/**
 * El siguiente script controla el envío de los datos
 * por ajax al backend
 */
$('#registerForm').on('submit', function(event) {
    event.preventDefault();

    // Indicador de carga
    Swal.fire({
        title: 'Cargando...',
        text: 'Por favor espera mientras procesamos tu solicitud',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Se pasa la información del formulario a un formData()
    const formData = new FormData(this);

    // Solicitud ajax
    $.ajax({
        url: '/register',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Se cierra el indicador de carga
            Swal.close();

            Swal.fire({
                title: `Registro exitoso!`,
                text: response.statusText,
                icon: 'success',
                confirmButtonText: 'Ok!',
                confirmButtonColor: '#28a745'
            })
        },
        error: function(error) {
            // Se cierra el indicador de carga
            Swal.close();

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
