<?php
session_start(); 
include 'bd.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crud Gaming</title>
    
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <!--Esta linea de bootstrap sirve para crear iconos
donde se llevara a cabo en botones de editar y borrar para -->
</head>
<body>
    <div class="container mt-5">

<?php 
    if (isset($_SESSION['mensaje'])) { 
?>
            <div class="alert alert-<?php echo $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <strong>¡Hecho!</strong> <?php echo $_SESSION['mensaje']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php 
        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_mensaje']);
     } 
?>
        <h1 class="text-center mb-4">CRUD solamente de Productos Gamer</h1>

            <div class="card shadow-sm mb-4">
            <div class="card-header"><h3>Agregale Nuevo Producto :D</h3></div>
            <div class="card-body">
                <form action="Guardar.php" method="POST">
            <div class="row">
            <div class="col-md-4 mb-3">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-4 mb-3">
                    <label for="precio" class="form-label">Precio ($)</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="col-md-4 mb-3">
                     <label for="stock" class="form-label">Stock</label>
                     <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            </div>
                     <button type="submit" class="btn btn-success w-100"><i class="bi bi-plus-circle"></i> Agregar Producto</button>
            </form>
            </div>
            </div>
        
            <div class="card shadow-sm">
            <div class="card-header"><h3>Tu Inventario Actual</h3></div>
            <div class="card-body">
                    <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
             </thead>
             <tbody>
<?php
    $query_select = "SELECT * FROM Producto_gamer ORDER BY id_producto ASC";
      $resultado = seleccionar($query_select); 
                        
       if ($resultado) {
     while ($fila = pg_fetch_assoc($resultado)) {
?>
             <tr>
                          <td><?php echo $fila['id_producto']; ?></td>
                          <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                          <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                          <td><?php echo $fila['stock']; ?></td>
                         <td>
         <a href="Editar.php?id=<?php echo $fila['id_producto']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
     <a href="Borrar.php?id=<?php echo $fila['id_producto']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');"><i class="bi bi-trash-fill"></i> Borrar</a>
            </td>
                 </tr>
<?php } } ?>
              </tbody>
             </table>
            </div>
        </div>
    </div>
     <!--Esta linea de script sirve para mensajes de alerta en este caso de 'Producto guardado'-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>