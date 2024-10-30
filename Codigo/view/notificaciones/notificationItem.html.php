<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación Detallada</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<h1>Detalles de la Notificación</h1>
<div class="notification-detail">
    <p><strong>Mensaje:</strong> <?php echo htmlspecialchars($notification['mensaje']); ?></p>
    <p><strong>Fecha:</strong> <?php echo htmlspecialchars($notification['fecha']); ?></p>
    <p><strong>Hora:</strong> <?php echo htmlspecialchars($notification['hora']); ?></p>

    <?php if (!$notification['visto']): ?>
        <p><strong>Status:</strong> <span class="unread">No Leído</span></p>
        <a href="index.php?controller=notificaciones&action=markAsRead&notification_id=<?php echo $notification['id']; ?>">Marcar como leído</a>
    <?php else: ?>
        <p><strong>Status:</strong> <span class="read">Leído</span></p>
    <?php endif; ?>
</div>
<a href="index.php?controller=notificaciones&action=viewNotifications">Volver a la lista</a>
</body>
</html>

