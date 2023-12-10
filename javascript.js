// Mostrar la ventana modal cuando el usuario hace clic en la disponibilidad
function mostrarModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

// Ocultar la ventana modal cuando el usuario hace clic en "Cerrar"
document.getElementById("cerrarModal").addEventListener("click", function() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
});
