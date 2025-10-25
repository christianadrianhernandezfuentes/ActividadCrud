<?php
include 'bd.php'; 

if (!isset($_GET['id'])) {
    header('Location: Tabla_Crud.php'); //Header como se recuerda permite llevar a la tabla de crud 
    // para que Guardar se conecte como un boton

    exit;
}
$id = intval($_GET['id']); 

$query_uno = "SELECT * FROM Producto_gamer WHERE id_producto = $1";
$resultado = seleccionar($query_uno, [$id]); 

if (pg_num_rows($resultado) == 0) {
    header('Location: Tabla_Crud.php'); //Header como se recuerda permite llevar a la tabla de crud
    //  para que Guardar se conecte como un boton

    exit;
}
$producto = pg_fetch_assoc($resultado);
//Todo de abajo permite modificar el producto ya que va buscar datos de un producto y para que se actualice en otro php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-header"><h3>Editando: <?php echo htmlspecialchars($producto['nombre']); ?></h3></div>
                    <div class="card-body">
                        <form action="Actualizar.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio ($)</label>
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto['stock']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                            <a href="Tabla_Crud.php" class="btn btn-secondary w-100 mt-2">Cancelar</a> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>