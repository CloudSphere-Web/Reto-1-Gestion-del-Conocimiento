<?php
// Obtener el correo electrónico del usuario desde la cookie
$userEmail = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : null;
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
    <div class="chat-messages" id="chat-messages">
        <!-- Los mensajes se cargarán aquí -->
    </div>

    <div class="chat-input">
        <form action="index.php?controller=ayuda&action=insertMessage" method="POST">
            <input type="text" name="message" placeholder="Escribe tu mensaje aquí...">
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>

<script>
    function loadMessages() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?controller=ayuda&action=getMessagesAjax', true);
        xhr.onload = function() {
            if (this.status === 200) {
                const response = JSON.parse(this.responseText);
                const messagesContainer = document.getElementById('chat-messages');
                messagesContainer.innerHTML = '';

                response.mensajes.forEach(function(mensaje) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = mensaje.user == response.user_id ? 'message user-message' : 'message support-message';

                    const messageHeader = document.createElement('div');
                    messageHeader.className = 'message-header';
                    const profileImg = document.createElement('img');
                    profileImg.src = mensaje.user_details.foto_perfil;
                    profileImg.alt = 'Foto de perfil';
                    profileImg.className = 'profile-img';
                    const userName = document.createElement('span');
                    userName.className = 'user-name';
                    userName.textContent = mensaje.user_details.nombre + ' ' + mensaje.user_details.apellidos;

                    messageHeader.appendChild(profileImg);
                    messageHeader.appendChild(userName);

                    const messageBody = document.createElement('div');
                    messageBody.className = 'message-body';
                    messageBody.textContent = mensaje.message;

                    messageDiv.appendChild(messageHeader);
                    messageDiv.appendChild(messageBody);

                    messagesContainer.appendChild(messageDiv);
                });

                // Desplazar al fondo después de cargar los mensajes
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        };
        xhr.send();
    }

    // Cargar los mensajes cada 1 segundo
    setInterval(loadMessages, 1000);
    // Cargar los mensajes al cargar la página
    window.onload = loadMessages;
</script>
</body>
</html>