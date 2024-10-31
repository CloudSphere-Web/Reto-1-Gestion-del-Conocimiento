<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AERGIBIDE - Crear Pregunta</title>
    <link rel="stylesheet" href="assets/css/publicar_pregunta.css">
</head>
<body>
<main class="main-content">
    <form action="index.php?controller=preguntas&action=save" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" id="titulo" name="titulo" placeholder="TITULO" required>
        </div>
        <div class="form-group">
            <textarea id="text" name="descripcion" placeholder="Este es el lugar para que cada uno escriba la duda o pregunta correspondiente que tenga, y así otro usuario o administrador pueda contestar y solucionar la cuestión que tenga." required></textarea>
        </div>
        <div class="form-group">
            <select id="categoria" name="categoria_id" required>
                <option value="" disabled selected>Categoría</option>
                <?php foreach ($dataToView['data']['categorias'] as $categoria): ?>
                    <option value="<?= htmlspecialchars($categoria['id']) ?>"><?= htmlspecialchars($categoria['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file-upload" class="file-upload">
                Subir archivo
                <input type="file" id="file-upload" name="archivo">
            </label>
        </div>
        <div class="buttons">
            <button type="submit" class="confirm">Confirmar</button>
            <a href="index.php?controller=preguntas&action=list_paginated" class="cancel">Cancelar</a>
        </div>
    </form>
</main>
<script src="assets/js/textarea_autoscroll.js"></script>
<script src="assets/js/validacionPublicar.js"></script>
</body>
</html>