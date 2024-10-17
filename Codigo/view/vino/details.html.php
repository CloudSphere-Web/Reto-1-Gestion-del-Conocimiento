<?php
$vino = $dataToView["data"];
?>

<div class="container mt-4">
    <h2 class="mb-3">Detalle vino</h2>
    
    <div class="mb-3">
        <a href="index.php?controller=vino&action=edit&id=<?php echo $vino['id']; ?>" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Editar
        </a>
        <a href="index.php?controller=vino&action=list" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
        <a href="index.php?controller=vino&action=delete&id=<?php echo $vino['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea borrar este vino?');">
            <i class="bi bi-trash"></i> Borrar
        </a>
    </div>

    <form>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" value="<?php echo htmlspecialchars($vino['nombre']); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="3" readonly><?php echo htmlspecialchars($vino['descripcion']); ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="año" class="form-label">Año</label>
            <input type="text" class="form-control" id="año" value="<?php echo htmlspecialchars($vino['año']); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="alcohol" class="form-label">Alcohol</label>
            <input type="text" class="form-control" id="alcohol" value="<?php echo htmlspecialchars($vino['alcohol']); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de vino</label>
            <input type="text" class="form-control" id="tipo" value="<?php echo htmlspecialchars($vino['tipo']); ?>" readonly>
        </div>
    </form>
</div>