<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AERGIBIDE Profile</title>
    <link rel="stylesheet" href="assets/css/admin_profile.css">
</head>
<body>

<?php $userData = $dataToView['data'];
?>
<div class="container">
    <div class="profile-section">
        <div class="profile-pic">
            <?php if ($userData['foto_perfil']) { ?>
                <img src="<?php echo $userData['foto_perfil']; ?>" alt="Avatar del usuario">
            <?php } else { ?>
                <?php echo substr($userData['nombre'], 0, 1) . substr($userData['apellidos'], 0, 1); ?>
            <?php } ?>
        </div>
        <div class="profile-info">
            <div class="name"><?php echo $userData['nombre'] . ' ' . $userData['apellidos']; ?></div>
            <div class="email"><?php echo $userData['email']; ?></div>
            <div class="position"><?php echo $userData['puesto']; ?></div>
            <div class="stats">
                <div class="stat-item"><img src="assets/img/userImagenes/preguntaImagen.png" class="stat-icon">1</div>
                <div class="stat-item"><img src="assets/img/userImagenes/respuestaImagen.png" class="stat-icon">1</div>
                <div class="stat-item"><img src="assets/img/userImagenes/favoritoImagen.png" class="stat-icon">1</div>
            </div>
        </div>
        <div class="Ranking">2</div>
    </div>

    <div class="tabs">
        <button class="tab tab-inicio" onclick="cargarContenido('viewListaUsuarios')">USUARIOS</button>
        <button class="tab" onclick="cargarContenido('viewRegisterUsuarios')">REGISTRAR</button>
        <button class="tab" onclick="cargarContenido('favoritos')">PROBLEMAS</button>
    </div>

    <div id="contenido-dinamico">
        <!-- Aquí se cargará el contenido de cada pestaña -->
    </div>

</div>
<script src="assets/js/tabs_admin.js"></script>
</body>
</html>