document.addEventListener("DOMContentLoaded", function () {
    // Botones
    const publicacionesBtn = document.getElementById("publicaciones-btn");
    const respuestasBtn = document.getElementById("respuestas-btn");
    const favoritosBtn = document.getElementById("favoritos-btn");
    const multimediaBtn = document.getElementById("multimedia-btn");

    // Asignar eventos a cada botón
    publicacionesBtn.addEventListener("click", function (event) {
        openTab(event, 'publicaciones');
        loadPublicaciones(); // Llamar la función que carga dinámicamente las publicaciones
    });

    respuestasBtn.addEventListener("click", function (event) {
        openTab(event, 'respuestas');
    });

    favoritosBtn.addEventListener("click", function (event) {
        openTab(event, 'favoritos');
    });

    multimediaBtn.addEventListener("click", function (event) {
        openTab(event, 'multimedia');
    });
});

function openTab(evt, tabName) {
    // Ocultar todo el contenido de las pestañas
    var tabcontent = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Eliminar la clase 'active' de todos los botones
    var tablinks = document.getElementsByClassName("tab");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Mostrar la pestaña actual y añadir la clase 'active' al botón seleccionado
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}

function loadPublicaciones() {
    const publicacionesDiv = document.getElementById('publicaciones');
    
    fetch('/ruta/al/php/que/muestra/publicaciones.php') // Enlaza con tu archivo PHP real
        .then(response => response.text())
        .then(data => {
            publicacionesDiv.innerHTML = data; 
        });
}

