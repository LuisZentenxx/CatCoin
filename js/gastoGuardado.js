document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar la recarga de la página

    // Aquí puedes agregar la lógica para guardar el gasto utilizando AJAX o enviar el formulario al servidor

    // Mostrar el aviso de gasto guardado
    Toastify({
      text: 'Gasto guardado exitosamente',
      duration: 3000, // Duración de la notificación en milisegundos
      gravity: 'top', // Posición de la notificación
      position: 'right', // Posición de la notificación
      backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)', // Colores de fondo
      stopOnFocus: true // Detener la duración al enfocar la notificación
    }).show();

    // Restablecer los valores del formulario
    document.getElementById('myForm').reset();
  });
});
