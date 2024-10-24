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
        if(count($dataToView["data"]) > 0){
            ?>
            <div class="question-list">
                <?php
                foreach($dataToView["data"] as $pregunta){
                    $titulo = isset($pregunta['titulo']) ? $pregunta['titulo'] : '';
                    $descripcion = isset($pregunta['descripcion']) ? $pregunta['descripcion'] : '';
                    $nombre = isset($pregunta['nombre']) ? $pregunta['nombre'] : '';
                    $apellidos = isset($pregunta['apellidos']) ? $pregunta['apellidos'] : '';
                    $fecha_publicacion = isset($pregunta['fecha_publicacion']) ? $pregunta['fecha_publicacion'] : '';
                    $hora_publicacion = isset($pregunta['hora_publicacion']) ? $pregunta['hora_publicacion'] : '';
                    $puesto = isset($pregunta['puesto']) ? $pregunta['puesto'] : '';
                    $foto_perfil = isset($pregunta['foto_perfil']) ? $pregunta['foto_perfil'] : 'default.png';
                    ?>
                    <article class="pregunta">
                        <div class="header-question">
                            <div class="avatar" role="img" aria-label="Avatar del usuario">
<!--                                <img src="assets/images/--><?php //echo $foto_perfil; ?><!--" alt="Avatar del usuario">-->
                                <img src="<?php echo $foto_perfil; ?>" alt="Avatar del usuario">
                            </div>
                            <div class="header-content">
                                <p class="question-user-fullname"><?php echo $nombre; ?> <?php echo $apellidos; ?></p>
                                <p class="question-date"><?php echo $fecha_publicacion; ?></p>
                                <p class="question-time"><?php echo $hora_publicacion; ?></p>
                                <p class="question-user-job"><?php echo $puesto; ?></p>
                            </div>
                            <div class="borrar"><img src="assets/svg/trash-can-solid.svg" alt="Descripción de la imagen"></div>
                        </div>
                        <div class="container">
                            <h1 class="question-titulo"><?php echo $titulo ?></h1>
                            <p class="question-descripcion"><?php echo $descripcion ?></p>
                        </div>
                        <div class="question-footer">
                            <div class="izquierda">
                                <div class="like"><img src="assets/svg/airplane-tilt-thin-svgrepo-com.svg" alt="Descripción de la imagen"></div>
                                <div class="compartir"><img src="assets/svg/share-white.svg" alt="Descripción de la imagen"></div>
                            </div>

                            <div class="fav"><img src="assets/svg/star-regular.svg" alt="Descripción de la imagen"></div>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

            <div class="respuestas">
                <article class="respuesta">
                    <div class="header">
                        <div class="avatar" role="img" aria-label="Avatar del usuario"><img src="Comentar Bien.png" alt="Descripción de la imagen"></div>
                        <div class="header">
                            <div class="avatar" role="img" aria-label="Avatar del usuario"></div>
                            <div class="headder-content">
                                <p class="question-user-name"><?php echo $nombreR; ?></p>
                                <p class="question-user-subname"><?php echo $apellidosR; ?></p>
                                <p class="question-date"><?php echo $fecha_publicacionR; ?></p>
                                <p class="question-time"><?php echo $hora_publicacionR; ?></p>
                                <p class="question-user-job"><?php echo $puestoR; ?></p>
                            </div>
                            <div class="borrar"><img src="Comentar Bien.png" alt="Descripción de la imagen"></div>
                        </div>
                        <div class="container">
                            <p class="question-descripcion"><?php echo $contenidoR ?></p>
                        </div>
                    <div class="question-footer">
                        <div class="izquierda">
                            <div class="like"><img src="Comentar Bien.png" alt="Descripción de la imagen"></div>
                            <div class="compartir"><img src="Comentar Bien.png" alt="Descripción de la imagen"></div>
                        </div>

                        <div class="fav"><img src="Comentar Bien.png" alt="Descripción de la imagen"></div>
                    </div>
                </article>
            </div>
</body>
</html>