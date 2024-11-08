<?php
// Obtener el correo electrónico del usuario desde la cookie
$userEmail = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : null;
//print_r($dataToView['data']);
//print_r($dataToView['data']['mensajes']['user']);
//print_r($dataToView['data']['user_id']);
//
//// Acceder al ID del usuario que envió el mensaje
//foreach ($dataToView['data']['mensajes'] as $mensaje) {
//    $userId = $mensaje['user']; // Aquí obtenemos el ID del usuario
//    echo "El ID del usuario que envió el mensaje es: " . $userId . "<br>";
//}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat de Ayuda</title>
    <link rel="stylesheet" href="assets/css/ayuda.css">
</head>
<body>
<div class="chat-container">
    <div class="chat-header">
        Chat de Ayuda
    </div>
    <div class="chat-messages">
        <?php if (isset($dataToView['data']['mensajes']) && is_array($dataToView['data']['mensajes'])): ?>
            <?php foreach ($dataToView['data']['mensajes'] as $mensaje):?>
                <div class="message <?php echo $mensaje['user'] == $dataToView['data']['user_id'] ? 'user-message' : 'support-message'; ?>">
<!--                    <div class="message --><?php //echo $dataToView['data']['user_details']['id'] == $dataToView['data']['user_id'] ? 'user-message' : 'support-message'; ?><!--">-->

                    <div class="message-header">
                        <!-- Mostrar la foto de perfil -->
                        <img src="<?php echo htmlspecialchars($mensaje['user_details']['foto_perfil'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto de perfil" class="profile-img">
                        <!-- Mostrar nombre y apellidos -->
                        <span class="user-name">
                            <?php echo htmlspecialchars($mensaje['user_details']['nombre'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($mensaje['user_details']['apellidos'], ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>
                    <div class="message-body">
                        <!-- Mostrar el mensaje -->
                        <?php echo htmlspecialchars($mensaje['message'], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="message support-message">
                No hay mensajes disponibles.
            </div>
        <?php endif; ?>
    </div>

    <div class="chat-input">
        <form action="index.php?controller=ayuda&action=insertMessage" method="POST">
            <input type="text" name="message" placeholder="Escribe tu mensaje aquí...">
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>

<!--<script>-->
<!--    setInterval(function() {-->
<!--        location.reload();  // Recarga la página-->
<!--    }, 1000);  // 1000 milisegundos = 1 segundo-->
<!--</script>-->


</body>
</html>
