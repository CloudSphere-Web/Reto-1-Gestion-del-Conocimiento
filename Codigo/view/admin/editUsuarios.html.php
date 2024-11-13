<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="assets/css/edit_user_profile.css">
</head>
<body>
<?php $userData = $dataToView['data']; ?>
<div class="container">
    <form action="index.php?controller=admin&action=editUsuarios&id=<?php echo $userData['id']; ?>" method="post" enctype="multipart/form-data" class="edit-user-form">
        <div class="profile-section">
            <div class="profile-pic">
                <?php if ($userData['foto_perfil']) { ?>
                    <img src="<?php echo $userData['foto_perfil']; ?>" alt="Avatar del usuario">
                <?php } else { ?>
                    <?php echo substr($userData['nombre'], 0, 1) . substr($userData['apellidos'], 0, 1); ?>
                <?php } ?>
            </div>
            <div class="profile-pic-edit">
                <label for="foto_perfil">Cambiar Foto:</label>
                <input type="file" id="foto_perfil" name="foto_perfil">
            </div>
            <a href="index.php?controller=usuario&action=deleteUser&user_id=<?php echo $userData['id']; ?>" class="user-delete" >
                <img src="assets/svg/trash-can-solid.svg" alt="Eliminar usuario">
            </a>
        </div>
        <div class="form-section">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $userData['nombre']; ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $userData['apellidos']; ?>" required>

            <label for="puesto">Puesto:</label>
            <input type="text" id="puesto" name="puesto" value="<?php echo $userData['puesto']; ?>">

            <label for="email-contacto">Email Contacto:</label>
            <input type="text" id="email-contacto" name="email-contacto" value="<?php echo $userData['email_contacto']; ?>">
        </div>
        <div class="form-buttons">
            <button type="submit" class="save-btn">Guardar Cambios</button>
            <a href="index.php?controller=admin&action=viewProfileAdmin" class="cancel-btn">Cancelar</a>
        </div>
    </form>
</div>
<script src="assets/js/validacionEditarUsuario.js"></script>
</body>
</html>