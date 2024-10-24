function cargarContenido(seccion) {
    // Realizar la petición AJAX
    fetch(`index.php?controller=usuario&action=${seccion}`)
        .then(response => response.text())
        .then(data => {
            // Actualizar el contenido
            document.getElementById('contenido-dinamico').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

// Cargar el contenido de "publicaciones" por defecto
document.addEventListener('DOMContentLoaded', () => cargarContenido('viewPreguntasUsuario'));