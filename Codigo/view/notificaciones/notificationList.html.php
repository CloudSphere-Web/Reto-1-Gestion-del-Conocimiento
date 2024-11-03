<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="assets/css/notificaciones.css">
</head>
<body>
<div class="container">
    <main class="main-content">
        <h1>Mis Notificaciones</h1>
        <ul class="notification-list">
            <?php
            // Verificar si existen notificaciones
            if (isset($dataToView['data']['notifications']) && !empty($dataToView['data']['notifications'])) {
                foreach ($dataToView['data']['notifications'] as $notification) {
                    ?>
                    <li class="notification-item">
                        <a href="index.php?controller=preguntas&action=details&id=<?php echo htmlspecialchars($notification['pregunta_id']); ?>">
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
                    <?php
                }
            } else {
                echo "<p>No tienes notificaciones.</p>";
            }

            // Manejar errores
            if (isset($dataToView['error'])) {
                echo "<div class='error'>" . htmlspecialchars($dataToView['error']) . "</div>";
            }
            ?>
        </ul>
    </main>
</div>
</body>
</html>
