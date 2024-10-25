<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas del Usuario</title>
    <link rel="stylesheet" href="assets/css/PreguntasUsuario.css">
</head>
<body>
<div class="question-list">
    <?php if (isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php elseif (empty($dataToView['data'])): ?>
        <p class="no-questions">No has realizado ninguna pregunta aún.</p>
    <?php else: ?>
        <?php foreach ($dataToView["data"] as $respuestas): ?>
            <a href="index.php?controller=preguntas&action=details&id=<?php echo $respuestas['id']; ?>" class='question-card'>
                <div class='avatar'></div>
                <div class='question-content'>
                    <p class='question-description'><?php echo htmlspecialchars($respuestas['contenido']); ?></p>
                    <p class='question-date'><?php echo htmlspecialchars($respuestas['fecha_publicacion']); ?></p>
                    <p class='question-time'><?php echo htmlspecialchars($respuestas['hora_publicacion']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>