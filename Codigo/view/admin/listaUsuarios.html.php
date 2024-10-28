<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
    <link rel="stylesheet" href="assets/css/listaUsuarios.css">
</head>
<body>
<div class="question-list">
    <?php if (isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php elseif (empty($dataToView['data'])): ?>
        <p class="no-questions">No has realizado ninguna pregunta aún.</p>
    <?php else: ?>
        <?php foreach ($dataToView["data"] as $usuario): ?>
            <a href="index.php?controller=admin&action=editUsuarios&id=<?php echo $usuario['id']; ?>" class='question-card'>
                <div class='avatar'>
                    <img src="<?php echo $usuario['foto_perfil'] ? $usuario['foto_perfil'] : 'default.png'; ?>" alt="Avatar del usuario">
                </div>
                <div class='user-content'>
                    <h2 class='user-fullname'><?php echo htmlspecialchars($usuario['nombre']); ?> <?php echo htmlspecialchars($usuario['apellidos']); ?></h2>
                    <p class='user-email'><?php echo htmlspecialchars($usuario['email']); ?></p>
                    <p class='user-puesto'><?php echo htmlspecialchars($usuario['puesto']); ?></p>
                    <p class='user-contact-email'><?php echo htmlspecialchars($usuario['email_contacto']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>