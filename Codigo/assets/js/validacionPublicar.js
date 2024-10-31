document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const titulo = document.getElementById("titulo");
    const descripcion = document.getElementById("text");
    const categoria = document.getElementById("categoria");
    const fileUpload = document.getElementById("file-upload");

    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Validación del título
        if (titulo.value.trim() === "") {
            alert("El título es obligatorio.");
            isValid = false;
        } else if (titulo.value.length > 200) {
            alert("El título no debe exceder los 200 caracteres.");
            isValid = false;
        }

        // Validación de la descripción
        if (descripcion.value.trim() === "") {
            alert("La descripción es obligatoria.");
            isValid = false;
        } else if (descripcion.value.length > 7000) {
            alert("La descripción no debe exceder los 7000 caracteres.");
            isValid = false;
        }

        // Validación de la categoría
        if (categoria.value === "") {
            alert("Selecciona una categoría.");
            isValid = false;
        }

        // Validación del archivo
        if (fileUpload.files.length > 0) {
            const file = fileUpload.files[0];
            const disallowedExtensions = ["exe", "bat", "cmd", "sh"]; // Extensiones de archivos no permitidos
            const fileExtension = file.name.split('.').pop().toLowerCase();

            // Comprobar si el archivo tiene una extensión prohibida
            if (disallowedExtensions.includes(fileExtension)) {
                alert("El archivo no puede ser un archivo ejecutable.");
                isValid = false;
            }
        }

        // Si alguna validación falla, evitar envío del formulario
        if (!isValid) {
            event.preventDefault();
        }
    });
});