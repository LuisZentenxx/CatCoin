var consejos = [
  "Mantén un registro detallado de tus gastos diarios para identificar patrones y áreas de mejora. Utiliza aplicaciones o herramientas de seguimiento de gastos para facilitar esta tarea.",
  "Considera utilizar el transporte público o compartir viajes con otras personas cuando sea posible. Esto te ayudará a ahorrar en costos de combustible y estacionamiento, además de reducir la huella de carbono.",
  "Cuando compres en línea, evita las compras impulsivas. Antes de finalizar una compra, revisa si realmente necesitas el producto y compara precios en diferentes tiendas en línea.",
  "Reserva las comidas en restaurantes y cafeterías para ocasiones especiales. Evita comer fuera en días laborables y opta por preparar tus comidas en casa o llevar tu almuerzo al trabajo.",
  "Destina una parte de tus ingresos a un fondo de emergencia. Esto te ayudará a cubrir gastos inesperados sin tener que recurrir a préstamos o tarjetas de crédito.",
  "Evita hacer compras cuando estés emocionalmente afectado. Las compras realizadas por impulso pueden ser costosas y muchas veces no satisfacen tus necesidades reales.",
  "Evalúa tus suscripciones de servicios de transmisión y considera si realmente necesitas todas ellas. Reducir el número de suscripciones te ayudará a ahorrar dinero cada mes.",
  "Opta por comprar alimentos frescos y cocinar tus comidas en casa en lugar de recurrir a alimentos procesados o comer fuera. Además de ser más saludable, también te ayudará a ahorrar dinero.",
];

var consejoIndex = 0;

function mostrarSiguienteConsejo() {
  var consejoActual = consejos[consejoIndex];
  var consejoElement = document.getElementById('consejo' + (consejoIndex + 1));

  consejoElement.style.display = "none"; // Oculta el consejo actual
  consejoElement.textContent = consejoActual;

  setTimeout(function() {
    consejoElement.style.display = "block"; // Muestra el nuevo consejo después de un breve retardo
  }, 100);

  consejoIndex++;

  if (consejoIndex === consejos.length) {
    consejoIndex = 0;
  }
}

// Establecer el contenido del primer consejo antes de iniciar el intervalo

// Comenzar el intervalo después de un breve retardo
setTimeout(function() {
  setInterval(mostrarSiguienteConsejo, 5000); // Cambia el consejo cada 5 segundos (5000 ms)
}, 100);