<?php
session_start();
include 'bd.php';   //Include lo que permite es conectarse a la bd.php para los datos que corresponde 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query_update = "UPDATE Producto_gamer SET nombre = $1, precio = $2, stock = $3 WHERE id_producto = $4";
    $datos = [$nombre, $precio, $stock, $id];

    actualizar($query_update, $datos); 

    $_SESSION['mensaje'] = '¡Producto actualizado correctamente!';
    $_SESSION['tipo_mensaje'] = 'info'; 

    //Header como se recuerda permite llevar a la tabla de crud para que Guardar se conecte como un boton

    header('Location: Tabla_Crud.php'); 
    exit;
}
?>