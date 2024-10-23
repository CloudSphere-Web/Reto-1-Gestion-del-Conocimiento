<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones del Usuario</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="/Codigo/assets/css/userPreguntas.css">
</head>
<body>
<div class="question-list">
    <!-- Aquí estará el contenido dinámico -->
    <?php
        // Código PHP para mostrar publicaciones
        foreach ($preguntas as $pregunta) {
            echo "<article class='question-card'>
                    <div class='avatar'></div>
                    <div class='question-content'>
                        <h2 class='question-title'>{$pregunta['titulo']}</h2>
                        <p class='question-description'>{$pregunta['descripcion']}</p>
                        <p class='question-date'>{$pregunta['fecha_publicacion']}</p>
                        <p class='question-time'>{$pregunta['hora_publicacion']}</p>
                    </div>
                </article>";
        }
    ?>
</div>
</body>
</html>

