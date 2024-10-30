<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="assets/css/notificaciones.css">
</head>
<body>
<h1>Mis Notificaciones</h1>
<ul class="notification-list">
    <?php if (!empty($notifications)): ?>
        <?php foreach ($notifications as $notification): ?>
            <li class="notification-item">
                <a href="index.php?controller=notificaciones&action=viewNotification&id=<?php echo $notification['id']; ?>">
                    <p>
                        <?php echo htmlspecialchars($notification['mensaje']); ?>
                        <strong><?php echo htmlspecialchars($notification['autor_nombre']); ?></strong>
                    </p>
                    <small><?php echo htmlspecialchars($notification['fecha'] . ' ' . $notification['hora']); ?></small>
                </a>
                <?php if (!$notification['visto']): ?>
                    <span class="unread">Nuevo</span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tienes notificaciones.</p>
    <?php endif; ?>
</ul>
</body>
</html>




