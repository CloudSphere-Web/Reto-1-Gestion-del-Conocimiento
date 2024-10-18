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
            <input type="text" placeholder="Buscar...">
        </div>
        <?php
        if(count($dataToView["data"]) > 0){
            ?>
            <div class="question-list">
                <?php
                foreach($dataToView["data"] as $pregunta){
                    $titulo = isset($pregunta['titulo']) ? $pregunta['titulo'] : '';
                    $descripcion = isset($pregunta['descripcion']) ? $pregunta['descripcion'] : '';
                    $fecha_publicacion = isset($pregunta['fecha_publicacion']) ? $pregunta['fecha_publicacion'] : '';
                    $hora_publicacion = isset($pregunta['hora_publicacion']) ? $pregunta['hora_publicacion'] : '';
                    ?>
                    <article class="question-card">
                        <div class="avatar" role="img" aria-label="Avatar del usuario"></div>
                        <div class="question-content">
                            <h2 class="question-title"><?php echo $titulo; ?></h2>
                            <p class="question-description"><?php echo $descripcion; ?></p>
                            <p class="question-date"><?php echo $fecha_publicacion; ?></p>
                            <p class="question-time"><?php echo $hora_publicacion; ?></p>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
            <nav class="pagination" aria-label="Navegación de páginas">
                <button>1</button>
                <button>Previous</button>
                <button>Next</button>
                <button>10</button>
            </nav>
            <?php
        } else {
            ?>
            <div class="alert alert-info">
                Actualmente no existen preguntas.
            </div>
            <?php
        }
        ?>
    </main>
    <aside class="sidebar">
        <button class="sidebar-button">Modelos</button>
        <button class="sidebar-button">Motor</button>
        <button class="sidebar-button">Sistema</button>
        <button class="sidebar-button">Especificaciones</button>
        <button class="sidebar-button">Tema X</button>
    </aside>
</div>
</body>
</html>