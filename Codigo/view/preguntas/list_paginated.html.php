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
            <a href="index.php?controller=preguntas&action=loadForm">Publicar pregunta</a>
        </div>

        <?php
        if(count($dataToView["data"][0]) > 0){
            foreach ($dataToView["data"][0] as $pregunta){
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
            ?>
            <nav aria-label="Paginación de notas" class="mt-4">
                <ul class="pagination justify-content-center">
                    <!-- Enlace a la página anterior -->
                    <?php if ($dataToView["data"][1] > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=preguntas&action=list_paginated&page=<?= $dataToView["data"][1] - 1; ?>">Anterior</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                    <?php endif; ?>
                    <!-- Enlaces de número de página -->
                    <?php for ($i = 1; $i <= $dataToView["data"][2]; $i++): ?>
                        <li class="page-item <?= ($i == $dataToView["data"][1]) ?'active' : ''; ?>">
                            <a class="page-link" href="index.php?controller=preguntas&action=list_paginated&page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <!-- Enlace a la página siguiente -->
                    <?php if ($dataToView["data"][1] < $dataToView["data"][2]): ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=preguntas&action=list_paginated&page=<?= $dataToView["data"][1] + 1; ?>">Siguiente</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Siguiente</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php
        }else{
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
    </aside>
</div>
</body>
</html>
