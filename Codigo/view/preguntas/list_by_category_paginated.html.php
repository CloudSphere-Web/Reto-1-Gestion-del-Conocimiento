<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Aviación</title>
    <link rel="stylesheet" href="assets/css/foro.css">
</head>
<body>
<div class="container">
    <main class="main-content">
        <div class="search-bar">
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="preguntas">
                <input type="hidden" name="action" value="search">
                <input type="text" name="keyword" placeholder="Buscar..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <?php
        if (isset($dataToView["data"]["preguntas"]) && count($dataToView["data"]["preguntas"]) > 0) {
            foreach ($dataToView["data"]["preguntas"] as $pregunta) {
                $titulo = $pregunta['titulo'] ?? '';
                $descripcion = $pregunta['descripcion'] ?? '';
                $fecha_publicacion = $pregunta['fecha_publicacion'] ?? '';
                $hora_publicacion = $pregunta['hora_publicacion'] ?? '';
                ?>
                <a href="index.php?controller=preguntas&action=details&id=<?php echo $pregunta['id']; ?>" class="question-card">
                    <div class="avatar" role="img" aria-label="Avatar del usuario">
                        <img src="<?php echo htmlspecialchars($pregunta['foto_perfil']); ?>" alt="Avatar">
                    </div>
                    <div class="question-content">
                        <h2 class="question-title"><?php echo htmlspecialchars($titulo); ?></h2>
                        <p class="question-description"><?php echo htmlspecialchars($descripcion); ?></p>
                        <p class="question-date"><?php echo htmlspecialchars($fecha_publicacion); ?></p>
                        <p class="question-time"><?php echo htmlspecialchars($hora_publicacion); ?></p>
                    </div>
                </a>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-info">Actualmente no existen preguntas.</div>
            <?php
        }
        ?>
    </main>
    <aside class="sidebar">
        <a class="sidebar-button" href="index.php?controller=preguntas&action=listByCategory&category=modelos">Modelos</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=listByCategory&category=motorizacion">Motorización</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=listByCategory&category=sistema">Sistema</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=listByCategory&category=especificaciones">Especificaciones</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=listByCategory&category=componentes">Componentes</a>

        <?php if (isset($dataToView["data"]["categoria"])): ?>
            <div class="category-description">
                <p><?php echo htmlspecialchars($dataToView["data"]["categoria"]["descripcion"]); ?></p>
            </div>
        <?php endif; ?>
    </aside>


</div>
</body>
</html>
