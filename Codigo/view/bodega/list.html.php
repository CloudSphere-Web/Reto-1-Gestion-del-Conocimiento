<div class="row">
    <div class="col-md-12 text-right">
        <a href="index.php?controller=bodega&action=create" class="btn btn-outline-primary">Añadir Bodega</a>
        <hr/>
    </div>
    <?php
    if(count($dataToView["data"]) > 0){
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Localización</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($dataToView["data"] as $bodega){
                $nombre = isset($bodega['nombre']) ? $bodega['nombre'] : '';
                $localizacion = isset($bodega['direccion']) ? $bodega['direccion'] : '';
                $telefono = isset($bodega['telefono']) ? $bodega['telefono'] : '';
                $email = isset($bodega['email']) ? $bodega['email'] : '';
                ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $localizacion; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $email; ?></td>
                    <td>
                        <a href="index.php?controller=bodega&action=details&id=<?php echo $bodega['id']; ?>" class="btn btn-primary">Entrar</a>
                        <a href="index.php?controller=bodega&action=delete&id=<?php echo $bodega['id']; ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }else{
        ?>
        <div class="alert alert-info">
            Actualmente no existen bodegas.
        </div>
        <?php
    }
    ?>
</div>