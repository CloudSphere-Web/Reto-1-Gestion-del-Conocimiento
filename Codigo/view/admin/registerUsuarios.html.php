<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="assets/css/register_user.css">
</head>
<body>
<div class="container-form">
    <form action="index.php?controller=admin&action=registerUsuario" method="post" enctype="multipart/form-data" class="edit-user-form">
        <div class="profile-section-form">
            <div class="profile-pic-form">
            </div>
            <div class="profile-pic-edit-form">
                <label for="foto_perfil">Cambiar Foto:</label>
                <input type="file" id="foto_perfil" name="foto_perfil">
            </div>
        </div>
        <div class="form-section">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="" required>

            <label for="contrasenna">Password:</label>
            <input type="password" id="contrasenna" name="contrasenna" value="" required>

            <label for="puesto">Puesto:</label>
            <input type="text" id="puesto" name="puesto" value="">

            <label for="email-contacto">Email Contacto:</label>
            <input type="text" id="email-contacto" name="email-contacto" value="">
        </div>
        <div class="form-buttons">
            <button type="submit" class="save-btn">Confirmar</button>
            <a href="index.php?controller=admin&action=viewProfile" class="cancel-btn">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>