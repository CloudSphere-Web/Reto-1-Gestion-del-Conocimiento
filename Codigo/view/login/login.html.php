<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="adrian@adrian.es" required>
        </div>
        <div class="input-group">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <label for="password">Password</label>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
            <input type="password" id="password" name="password" value="••••••••••••••••••" required>
        </div>
        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <a href="index.php?controller=preguntas&action=list_paginated" class="login-button">Login</a>
    </form>
</div>
</body>
</html>