document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".edit-user-form");
    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");
    const puesto = document.getElementById("puesto");
    const emailContacto = document.getElementById("email-contacto");
    const fileUpload = document.getElementById("foto_perfil");

    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Validación del nombre
        if (nombre.value.trim() === "") {
            alert("El nombre es obligatorio.");
            isValid = false;
        } else if (nombre.value.length > 50) {
            alert("El nombre no debe exceder los 50 caracteres.");
            isValid = false;
        }

        // Validación de los apellidos
        if (apellidos.value.trim() === "") {
            alert("Los apellidos son obligatorios.");
            isValid = false;
        } else if (apellidos.value.length > 70) {
            alert("Los apellidos no deben exceder los 70 caracteres.");
            isValid = false;
        }

        // Validación del puesto
        if (puesto.value.length > 50) {
            alert("El puesto no debe exceder los 50 caracteres.");
            isValid = false;
        }

        // Validación del email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para email
        if (!emailPattern.test(emailContacto.value)) {
            alert("Por favor, introduce un email válido.");
            isValid = false;
        }

        // Validación del archivo
        if (fileUpload.files.length > 0) {
            const file = fileUpload.files[0];
            const allowedExtensions = ["jpg", "jpeg", "png"];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            const maxSize = 2 * 1024 * 1024; // 2 MB

            // Comprobar si el archivo tiene una extensión permitida
            if (!allowedExtensions.includes(fileExtension)) {
                alert("Solo se permiten imágenes (JPG, JPEG, PNG).");
                isValid = false;
            } else if (file.size > maxSize) {
                alert("El archivo no debe exceder los 2 MB.");
                isValid = false;
            }
        }

        // Si alguna validación falla, evitar envío del formulario
        if (!isValid) {
            event.preventDefault();
        }
    });
});