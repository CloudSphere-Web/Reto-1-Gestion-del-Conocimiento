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
        <p class="no-questions">No has realizado ninguna pregunta con multimedia aún.</p>
    <?php else: ?>
        <?php foreach ($dataToView["data"] as $multimedia): ?>
            <a href="index.php?controller=preguntas&action=details&id=<?php echo $multimedia['id']; ?>" class='question-card'>
                <div class='avatar'></div>
                <div class='question-content'>
                    <h2 class='question-title'><?php echo htmlspecialchars($multimedia['titulo']); ?></h2>
                    <p class='question-description'><?php echo htmlspecialchars($multimedia['descripcion']); ?></p>
                    <p class='question-date'><?php echo htmlspecialchars($multimedia['fecha_publicacion']); ?></p>
                    <p class='question-time'><?php echo htmlspecialchars($multimedia['hora_publicacion']); ?></p>
                    <div class="Multimedia-icon">
                        <img src="assets/img/userImagenes/multimediaIcono.png" alt="Multimedia" class="imagen-fav">
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>


