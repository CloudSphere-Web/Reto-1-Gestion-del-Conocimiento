<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AERGIBIDE Profile</title>
    <link rel="stylesheet" href="/Codigo/assets/css/user_profile.css">
</head>
<body>
<div class="container">
    <div class="profile-section">
        <div class="profile-pic">ZA</div>
        <div class="profile-info">
            <div class="name">Zahir Allonso Rivera Chacon</div>
            <div class="email">zahirallonso.rivera@ikasle.egibide.com</div>
            <div class="position">Director General</div>
            <div class="stats">
                <div class="stat-item"><img src="/Codigo/assets/img/userImagenes/preguntaImagen.png" class="stat-icon"/>1</div>
                <div class="stat-item"><img src="/Codigo/assets/img/userImagenes/respuestaImagen.png" class="stat-icon"/>1</div>
            <div class="stat-item"><img src="/Codigo/assets/img/userImagenes/favoritoImagen.png" class="stat-icon"/>1</div>
    </div>
</div>
<div class="Ranking">2</div>
</div>

<!-- Botones de pestañas -->
<div class="tabs">
    <button class="tab tab-inicio" id="publicaciones-btn">PUBLICACIONES</button>
    <button class="tab" id="respuestas-btn">RESPUESTAS</button>
    <button class="tab" id="favoritos-btn">FAVORITOS</button>
    <button class="tab tab-final" id="multimedia-btn">MULTIMEDIA</button>
</div>

<!-- Contenidos de las pestañas -->
<div class="tab-content" id="publicaciones" style="display: none;">
    <!-- Aquí se cargarán dinámicamente las publicaciones del usuario -->
</div>
<div class="tab-content" id="respuestas" style="display: none;">
    <!-- Contenido para las respuestas -->
    <p>Contenido de respuestas del usuario.</p>
</div>
<div class="tab-content" id="favoritos" style="display: none;">
    <!-- Contenido para los favoritos -->
    <p>Contenido de favoritos del usuario.</p>
</div>
<div class="tab-content" id="multimedia" style="display: none;">
    <!-- Contenido multimedia -->
    <p>Contenido multimedia del usuario.</p>
</div>
</div>

<!-- Enlace al archivo JavaScript -->
<script src="/Codigo/assets/js/tabs.js"></script>
</body>
</html>
