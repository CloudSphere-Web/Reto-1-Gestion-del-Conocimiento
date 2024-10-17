<?php
$vinos = isset($dataToView["data"]) ? $dataToView["data"] : [];
$id_bodega = isset($dataToView["id_bodega"]) ? $dataToView["id_bodega"] : null;
?>

<div class="container mt-4">
    <h2 class="mb-4">Lista de Vinos</h2>
    
    <?php if (empty($vinos)): ?>
        <div class="alert alert-info" role="alert">
            No se encontraron vinos para esta bodega.
        </div>
    <?php else: ?>
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vinos as $vino): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($vino['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($vino['tipo']); ?></td>
                        <td>
                            <a href="index.php?controller=vino&action=details&id=<?php echo $vino['id']; ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="index.php?controller=vino&action=delete&id=<?php echo $vino['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea borrar este vino?');">
                                <i class="bi bi-trash"></i> Borrar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    
    <a href="index.php?controller=vino&action=create&id_bodega=<?php echo $id_bodega; ?>" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Añadir Nuevo Vino
    </a>
</div>