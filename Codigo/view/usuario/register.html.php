<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
<div class="register-container">
    <h2>Register</h2>
    <?php if (isset($view_data['error'])): ?>
        <p class="error"><?php echo $view_data['error']; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="input-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="contrasenna">Contraseña</label>
            <input type="password" id="contrasenna" name="contrasenna" required>
        </div>
        <div class="input-group">
            <label for="puesto">Puesto</label>
            <input type="text" id="puesto" name="puesto" required>
        </div>
        <div class="input-group">
            <label for="email_contacto">Email Contacto</label>
            <input type="email" id="email_contacto" name="email_contacto">
        </div>
        <div class="input-group">
            <label for="foto_perfil">Foto Perfil</label>
            <input type="text" id="foto_perfil" name="foto_perfil">  <!-- Adjust for actual file upload -->
        </div>
        <input class="register-button" type="submit" value="Register" />
    </form>
</div>
</body>
</html>
