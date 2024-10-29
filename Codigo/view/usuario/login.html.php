<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php if (isset($view_data['error'])): ?>
        <p class="error"><?php echo $view_data['error']; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="contrasenna">Contraseña</label>
            <input type="password" id="contrasenna" name="contrasenna" required>
        </div>
        <input class="login-button" type="submit" value="Login" />
    </form>
</div>
<script src="assets/js/lightMode.js"></script>
</body>
</html>
