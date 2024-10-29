<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta</title>
    <link rel="stylesheet" href="assets/css/responder_pregunta.css">
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
<!--                        <div class="izquierda">-->
<!--                            <div class="like"><img src="assets/svg/airplane-tilt-thin-svgrepo-com.svg" alt="Like"></div>-->
<!--                            <a href="index.php?controller=preguntas&action=responder&id=--><?php //echo $pregunta['id']; ?><!--" class="comentar">-->
<!--                                <img src="assets/svg/share-white.svg" alt="Comentar">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="fav"><img src="assets/svg/star-regular.svg" alt="Favorite"></div>-->
                    </div>
                </article>
            </div>
            <?php
        } else {
            echo "<p>No se encontró la pregunta.</p>";
        }
        ?>

        <div class="container-form">
            <main class="main-content">
                <form action="index.php?controller=preguntas&action=saveRespuesta&id=<?php echo $pregunta['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea id="text" name="contenido" placeholder="Este es el lugar para que cada uno escriba la duda o pregunta correspondiente que tenga, y así otro usuario o administrador pueda contestar y solucionar la cuestión que tenga." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file-upload" class="file-upload">
                            Subir archivo
                            <input type="file" id="file-upload" name="archivo">
                        </label>
                    </div>
                    <div class="buttons">
                        <button type="submit" class="confirm">Confirmar</button>
<!--                        <button type="button" class="cancel">Cancelar</button>-->
                        <a href="index.php?controller=preguntas&action=details&id=<?php echo $pregunta['id']; ?>" class="cancel">Cancelar</a>
                    </div>
                </form>
            </main>
        </div>
    </main>
</div>
<script src="assets/js/textarea_autoscroll.js"></script>
</body>
</html>