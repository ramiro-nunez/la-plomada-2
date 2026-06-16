document.addEventListener('DOMContentLoaded', function () {
        const radioDomicilio = document.getElementById('envio_domicilio');
        const radioSucursal = document.getElementById('envio_sucursal');
        const contenedorDireccion = document.getElementById('contenedor-direccion');
        const inputsDireccion = contenedorDireccion.querySelectorAll('input');

        function alternarFormularioEnvio() {
            if (radioSucursal.checked) {
                // Ocultar el formulario con clases nativas de Bootstrap
                contenedorDireccion.classList.add('d-none');
                // Deshabilitar inputs para que no se envíen datos vacíos al backend
                inputsDireccion.forEach(input => input.removeAttribute('required'));
            } else {
                // Mostrar formulario
                contenedorDireccion.classList.remove('d-none');
                // Hacer obligatorios los campos si va a domicilio
                inputsDireccion.forEach(input => input.setAttribute('required', 'true'));
            }
        }

        // Escuchar los cambios en los radio buttons
        radioDomicilio.addEventListener('change', alternarFormularioEnvio);
        radioSucursal.addEventListener('change', alternarFormularioEnvio);
        
        // Ejecutar al cargar la página por primera vez
        alternarFormularioEnvio();
        const form = document.getElementById('formCheckout');
        const btnPreConfirmar = document.getElementById('btn-pre-confirmar');
        
        // Inicializamos el modal de Bootstrap mediante JS para poder controlarlo a gusto
        const modalConfirmacion = new bootstrap.Modal(document.getElementById('modalConfirmacion'));

        btnPreConfirmar.addEventListener('click', function () {
            // Le pedimos al formulario que se valide a sí mismo (revisa inputs required.)
            if (form.checkValidity()) {
                // SI ESTÁ TODO COMPLETADO: Abrimos el modal flotante de forma manual
                modalConfirmacion.show();
            } else {
                // SI FALTA ALGO: el navegador a mostrar los globos de error nativos
                form.reportValidity();
            }
        });
        const btnFinalizarCompra = document.getElementById('btn-finalizar-compra');

        btnFinalizarCompra.addEventListener('click', function() {
            form.submit(); // Fuerza al formulario a enviarse sí o sí al hacer clic en el modal
        });
    });