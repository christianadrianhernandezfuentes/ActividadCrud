<?php
session_start();
include 'bd.php';   //Include lo que permite es conectarse a la bd.php para los datos que corresponde

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $query_delete = "DELETE FROM Producto_gamer WHERE id_producto = $1";
    $datos = [$id];

    eliminar($query_delete, $datos); 

    $_SESSION['mensaje'] = 'Producto eliminado exitosamente.';
    $_SESSION['tipo_mensaje'] = 'danger';
}

//Header como se recuerda permite llevar a la tabla de crud para que Guardar se conecte como un boton

header('Location: Tabla_Crud.php'); 
exit;
?>