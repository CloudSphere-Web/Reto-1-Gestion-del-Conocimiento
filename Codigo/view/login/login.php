<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
<div class="background">
    <div class="login-container">
        <h2>Login</h2>
        <form>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email">

            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" placeholder="Password">
                <a href="#">Forgot Password?</a>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember me</label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>
