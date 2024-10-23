// Función para cambiar de pestaña
function openTab(evt, tabName) {
    // Ocultar todo el contenido de las pestañas
    var tabcontent = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Eliminar la clase "active" de todos los botones
    var tablinks = document.getElementsByClassName("tab");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Mostrar el contenido actual y marcar el botón como activo
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}

// Cargar dinámicamente las publicaciones del usuario
function loadPublicaciones() {
    const publicacionesDiv = document.getElementById('publicaciones');
    // Hacer una llamada AJAX o Fetch para cargar el contenido dinámico
    fetch('/Codigo/view/usuario/UsuarioPreguntas.php') // Enlaza a tu archivo PHP que contiene el código de preguntas
        .then(response => response.text())
        .then(data => {
            publicacionesDiv.innerHTML = data; // Mostrar el contenido en el div
        });
}

// Iniciar con la pestaña "PUBLICACIONES" abierta
window.onload = function () {
    document.querySelector('.tab-inicio').click();
    loadPublicaciones(); // Cargar publicaciones al cargar la página
}
