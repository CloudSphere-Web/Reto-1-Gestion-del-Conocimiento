<?php
$id_bodega = $nombre = $descripcion = $año = $alcohol = $tipo = "";
if (isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if (isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];
if (isset($dataToView["data"]["año"])) $año = $dataToView["data"]["año"];
if (isset($dataToView["data"]["alcohol"])) $alcohol = $dataToView["data"]["alcohol"];
if (isset($dataToView["data"]["tipo"])) $tipo = $dataToView["data"]["tipo"];
if (isset($dataToView["data"]["id_bodega"])) $id_bodega = $dataToView["data"]["id_bodega"];
?>
<div class="row">
    <?php if (isset($_GET["response"]) and $_GET["response"] === true): ?>
        <div class="alert alert-success">
            Vino añadido correctamente. <a href="index.php?controller=bodega&action=details&id=<?php echo $id_bodega; ?>">Volver a la bodega</a>
        </div>
    <?php endif; ?>
    <form class="form" action="index.php?controller=vino&action=save" method="POST">
        <input type="hidden" name="id_bodega" value="<?php echo $id_bodega; ?>" />
        <div class="form-group">
            <label>Nombre del Vino</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" required />
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea class="form-control" name="descripcion" required><?php echo $descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <label>Año</label>
            <input class="form-control" type="number" name="año" value="<?php echo $año; ?>" required />
        </div>
        <div class="form-group">
            <label>Alcohol (%)</label>
            <input class="form-control" type="number" step="0.1" name="alcohol" value="<?php echo $alcohol; ?>" required />
        </div>
        <div class="form-group">
            <label>Tipo</label>
            <input class="form-control" type="text" name="tipo" value="<?php echo $tipo; ?>" required />
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger" href="index.php?">Cancelar</a>
    </form>
</div>