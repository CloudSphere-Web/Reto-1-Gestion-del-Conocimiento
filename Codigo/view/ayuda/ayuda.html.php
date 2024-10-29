<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Chat en Vivo</title>
</head>
<body>
  <h2>Chat en Vivo</h2>
  <div id="chatBox" style="height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;"></div>
  <input type="text" id="username" placeholder="Nombre de usuario">
  <input type="text" id="message" placeholder="Escribe un mensaje...">
  <button onclick="sendMessage()">Enviar</button>

  <script>
    const socket = new WebSocket("ws://localhost:8080");

    socket.onmessage = function(event) {
      const data = JSON.parse(event.data);
      const chatBox = document.getElementById('chatBox');
      chatBox.innerHTML += `<p><strong>${data.user}:</strong> ${data.message}</p>`;
      chatBox.scrollTop = chatBox.scrollHeight;
    };

    function sendMessage() {
      const username = document.getElementById('username').value;
      const message = document.getElementById('message').value;
      if (username && message) {
        const data = {
          user: username,
          message: message
        };
        socket.send(JSON.stringify(data));
        document.getElementById('message').value = '';
      } else {
        alert("Por favor, introduce tu nombre y mensaje.");
      }
    }
  </script>
</body>
</html>
