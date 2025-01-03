<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AERGIBIDE Profile</title>
    <link rel="stylesheet" href="assets/css/user_profile.css">
</head>
<body>
<?php $userData = $dataToView['data'];
?>
<div class="container">
    <div class="profile-section">
        <div class="profile-pic">
            <?php if ($userData['data']['foto_perfil']) { ?>
                <img src="<?php echo $userData['data']['foto_perfil']; ?>" alt="Avatar del usuario">
            <?php } else { ?>
                <?php echo substr($userData['data']['nombre'], 0, 1) . substr($userData['data']['apellidos'], 0, 1); ?>
            <?php } ?>
        </div>
        <div class="profile-info">
            <div class="name"><?php echo $userData['data']['nombre'] . ' ' . $userData['data']['apellidos']; ?></div>
            <div class="email"><?php echo $userData['data']['email_contacto']; ?></div>
            <div class="position"><?php echo $userData['data']['puesto']; ?></div>
            <div class="stats">
                <div class="stat-item">
                    <img src="assets/img/userImagenes/preguntaImagen.png" class="stat-icon">
                    <?php echo $userData['preguntasCount']; ?>
                </div>
                <div class="stat-item">
                    <img src="assets/img/userImagenes/respuestaImagen.png" class="stat-icon">
                    <?php echo $userData['respuestasCount']; ?>
                </div>
                <div class="stat-item">
                    <img src="assets/img/userImagenes/favoritoImagen.png" class="stat-icon">
                    <?php echo $userData['favoritosCount']; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de pestañas -->
    <div class="tabs">
        <button class="tab tab-inicio" onclick="cargarContenido('viewPreguntasUsuario')">PUBLICACIONES</button>
        <button class="tab" onclick="cargarContenido('viewRespuestasUsuario')">RESPUESTAS</button>
        <button class="tab" onclick="cargarContenido('viewFavoritosUsuario')">FAVORITOS</button>
        <button class="tab tab-final" onclick="cargarContenido('viewMultimediaUsuario')">MULTIMEDIA</button>
    </div>

    <div id="contenido-dinamico">
        <!-- Aquí se cargará el contenido de cada pestaña -->
    </div>
</div>

<!-- Enlace al archivo JavaScript -->
<script src="assets/js/tabs.js"></script>
</body>
</html>