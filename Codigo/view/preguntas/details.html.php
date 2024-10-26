<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta</title>
    <link rel="stylesheet" href="assets/css/pregunta_details.css">
</head>

<body>
    <div class="container">
        <main class="main-content">
            <?php
            // Renderizar la pregunta si existen datos
            if (isset($dataToView["data"]["pregunta"])) {
                $pregunta = $dataToView["data"]["pregunta"];
            ?>
                <div class="question-list">
                    <article class="pregunta">
                        <div class="header-question">
                            <div class="avatar" role="img" aria-label="Avatar del usuario">
                                <img src="<?php echo $pregunta['foto_perfil'] ? $pregunta['foto_perfil'] : 'default.png'; ?>" alt="Avatar del usuario">
                            </div>
                            <div class="header-content">
                                <p class="question-user-fullname"><?php echo $pregunta['nombre']; ?> <?php echo $pregunta['apellidos']; ?></p>
                                <p class="question-date"><?php echo $pregunta['fecha_publicacion']; ?></p>
                                <p class="question-time"><?php echo $pregunta['hora_publicacion']; ?></p>
                                <p class="question-user-job"><?php echo $pregunta['puesto']; ?></p>
                            </div>
                        </div>
                        <div class="container">
                            <h1 class="question-titulo"><?php echo $pregunta['titulo']; ?></h1>
                            <p class="question-descripcion"><?php echo $pregunta['descripcion']; ?></p>
                        </div>
                        <div class="question-footer">
                            <div class="izquierda">
                                <div class="like"><img src="assets/svg/airplane-tilt-thin-svgrepo-com.svg" alt="Like"></div>
                                <a href="index.php?controller=preguntas&action=responder&id=<?php echo $pregunta['id']; ?>" class="comentar">
                                    <img src="assets/svg/share-white.svg" alt="Comentar">
                                </a>
                            </div>
                            <div class="fav"><img src="assets/svg/star-regular.svg" alt="Favorite"></div>
                        </div>
                    </article>
                </div>
                <?php
            } else {
                echo "<p>No se encontró la pregunta.</p>";
            }

            // Verificar si existen respuestas
            if (isset($dataToView["data"]["respuestas"]) && is_array($dataToView["data"]["respuestas"])) {
                if (count($dataToView["data"]["respuestas"]) > 0) {
                ?>
                    <div class="respuestas">
                        <?php
                        foreach ($dataToView["data"]["respuestas"] as $respuesta) {
                        ?>
                            <article class="respuesta">
                                <div class="header-question">
                                    <div class="avatar" role="img" aria-label="Avatar del usuario">
                                        <img src="<?php echo $respuesta['foto_perfil'] ? $respuesta['foto_perfil'] : 'default.png'; ?>" alt="Avatar del usuario">
                                    </div>
                                    <div class="header-content">
                                        <p class="question-user-fullname"><?php echo $respuesta['nombre']; ?> <?php echo $respuesta['apellidos']; ?></p>
                                        <p class="question-date"><?php echo $respuesta['fecha_publicacion']; ?></p>
                                        <p class="question-time"><?php echo $respuesta['hora_publicacion']; ?></p>
                                        <p class="question-user-job"><?php echo $respuesta['puesto']; ?></p>
                                    </div>
                                </div>
                                <div class="container">
                                    <p class="respuesta-contenido"><?php echo $respuesta['contenido']; ?></p>
                                </div>
                                <div class="answer-footer">
                                    <div class="izquierda">
                                        <div class="like"><img src="assets/svg/airplane-tilt-thin-svgrepo-com.svg" alt="Like"></div>
                                        <div class="compartir"><img src="assets/svg/share-white.svg" alt="Share"></div>
                                    </div>
                                    <div class="fav"><img src="assets/svg/star-regular.svg" alt="Favorite"></div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                } else {
                    echo "<p>No hay respuestas para esta pregunta.</p>";
                }
            } else {
                echo "<p>No se encontraron respuestas.</p>";
            }
            ?>
        </main>
    </div>



</body>

</html>