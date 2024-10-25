<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Aviación - Búsqueda</title>
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
            <a href="index.php?controller=preguntas&action=loadForm">Publicar pregunta</a>
        </div>

        <?php
        if (isset($dataToView["data"]) && count($dataToView["data"]) > 0) {
            foreach ($dataToView["data"] as $pregunta) {
                $titulo = isset($pregunta['titulo']) ? $pregunta['titulo'] : '';
                $descripcion = isset($pregunta['descripcion']) ? $pregunta['descripcion'] : '';
                $fecha_publicacion = isset($pregunta['fecha_publicacion']) ? $pregunta['fecha_publicacion'] : '';
                $hora_publicacion = isset($pregunta['hora_publicacion']) ? $pregunta['hora_publicacion'] : '';
                ?>
                <a href="index.php?controller=preguntas&action=details&id=<?php echo $pregunta['id']; ?>" class='question-card'>
                    <div class='avatar'>
                        <img src="<?php echo $pregunta['foto_perfil'] ? $pregunta['foto_perfil'] : 'default.png'; ?>" alt="Avatar del usuario">
                    </div>
                    <div class='question-content'>
                        <h2 class='question-title'><?php echo htmlspecialchars($pregunta['titulo']); ?></h2>
                        <p class='question-description'><?php echo htmlspecialchars($pregunta['descripcion']); ?></p>
                        <p class='question-date'><?php echo htmlspecialchars($pregunta['fecha_publicacion']); ?></p>
                        <p class='question-time'><?php echo htmlspecialchars($pregunta['hora_publicacion']); ?></p>
                    </div>
                </a>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-info">No se encontraron resultados para tu búsqueda.</div>
            <?php
        }
        ?>
    </main>
    <aside class="sidebar">
        <a class="sidebar-button" href="index.php?controller=preguntas&action=list_by_category&category=modelos">Modelos</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=list_by_category&category=motorizacion">Motorización</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=list_by_category&category=sistema">Sistema</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=list_by_category&category=especificaciones">Especificaciones</a>
        <a class="sidebar-button" href="index.php?controller=preguntas&action=list_by_category&category=componentes">Componentes</a>
    </aside>
</div>
</body>
</html>