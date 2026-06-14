// Script para enviar datos de consultas al webhook
document.addEventListener('DOMContentLoaded', function() {
  const botonesEnviar = document.querySelectorAll('.btn-enviar-webhook');

  botonesEnviar.forEach(boton => {
    boton.addEventListener('click', async function() {
      // Obtener la fila actual
      const fila = this.closest('.fila-consulta');

      // Capturar datos de los atributos data-*
      const datos = {
        nombre: fila.querySelector('[data-nombre]').textContent.trim(),
        apellido: fila.querySelector('[data-apellido]').textContent.trim(),
        email: fila.querySelector('[data-email]').textContent.trim(),
        telefono: fila.querySelector('[data-telefono]').textContent.trim(),
        asunto: fila.querySelector('[data-asunto]').textContent.trim(),
        mensaje: fila.querySelector('[data-mensaje]').textContent.trim(),
        timestamp: new Date().toISOString()
      };

      // Deshabilitar botón y mostrar estado
      const textoOriginal = boton.innerHTML;
      boton.disabled = true;
      boton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Enviando...';

      try {
        const response = await fetch('https://acronymic-ila-pentadactyl.ngrok-free.dev/webhook-test/cac9613d-4a21-431b-b563-1ebd919a310f', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos)
        });

        if (response.ok) {
          // Éxito
          boton.classList.remove('btn-warning');
          boton.classList.add('btn-success');
          boton.innerHTML = '<i class="bi bi-check-circle"></i> Enviado';
          
          // Mostrar alerta de éxito
          mostrarAlerta('✓ Consulta enviada correctamente al workflow', 'success');
        } else {
          throw new Error('Error en el servidor: ' + response.status);
        }
      } catch (error) {
        // Error
        boton.disabled = false;
        boton.innerHTML = textoOriginal;
        mostrarAlerta('✗ Error: ' + error.message, 'danger');
        console.error('Error:', error);
      }
    });
  });
});

// Función para mostrar alertas
function mostrarAlerta(mensaje, tipo) {
  const alerta = document.createElement('div');
  alerta.className = `alert alert-${tipo} alert-dismissible fade show shadow-sm position-fixed top-0 start-0 m-3`;
  alerta.style.zIndex = '9999';
  alerta.innerHTML = `
    <i class="bi bi-${tipo === 'success' ? 'check-circle-fill' : 'exclamation-circle-fill'} me-2"></i>
    ${mensaje}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  `;

  document.body.insertBefore(alerta, document.body.firstChild);

  // Auto-desaparecer después de 4 segundos
  setTimeout(() => {
    alerta.remove();
  }, 4000);
}