<?php
$id = $nombre = $direccion = $email = $telefono = $contacto = $fundacion = $descripcion = $restaurante = $hotel = "";
if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["direccion"])) $direccion = $dataToView["data"]["direccion"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];
if(isset($dataToView["data"]["telefono"])) $telefono = $dataToView["data"]["telefono"];
if(isset($dataToView["data"]["persona_contacto"])) $contacto = $dataToView["data"]["persona_contacto"];
if(isset($dataToView["data"]["año_fundacion"])) $fundacion = $dataToView["data"]["año_fundacion"];
if(isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];
if(isset($dataToView["data"]["disponibilidad_restaurante"])) $restaurante = $dataToView["data"]["disponibilidad_restaurante"];
if(isset($dataToView["data"]["disponibilidad_hotel"])) $hotel = $dataToView["data"]["disponibilidad_hotel"];
?>
<div class="row">
    <?php if(isset($_GET["response"]) and $_GET["response"] === true): ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="index.php?controller=bodega&action=list">Volver al listado</a>
        </div>
    <?php endif; ?>
    <form class="form" action="index.php?controller=bodega&action=save" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input class="form-control" type="text" name="direccion" value="<?php echo $direccion; ?>" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input class="form-control" type="text" name="telefono" value="<?php echo $telefono; ?>" />
        </div>
        <div class="form-group">
            <label>Persona de Contacto</label>
            <input class="form-control" type="text" name="persona_contacto" value="<?php echo $contacto; ?>" />
        </div>
        <div class="form-group">
            <label>Año de Fundación</label>
            <input class="form-control" type="number" name="año_fundacion" value="<?php echo $fundacion; ?>" />
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea class="form-control" name="descripcion"><?php echo $descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <label>¿Dispone de Restaurante?</label><br>
            <input type="radio" name="disponibilidad_restaurante" value="1" <?php echo ($restaurante == 1) ? 'checked' : ''; ?> /> Sí
            <input type="radio" name="disponibilidad_restaurante" value="0" <?php echo ($restaurante == 0) ? 'checked' : ''; ?> /> No
        </div>
        <div class="form-group">
            <label>¿Dispone de Hotel?</label><br>
            <input type="radio" name="disponibilidad_hotel" value="1" <?php echo ($hotel == 1) ? 'checked' : ''; ?> /> Sí
            <input type="radio" name="disponibilidad_hotel" value="0" <?php echo ($hotel == 0) ? 'checked' : ''; ?> /> No
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger" href="index.php?controller=bodega&action=list">Cancelar</a>
    </form>
</div>