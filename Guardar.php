<?php
session_start();
include 'bd.php';   //Include lo que permite es conectarse a la bd.php para los datos que corresponde 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query_insert = "INSERT INTO Producto_gamer (nombre, precio, stock) VALUES ($1, $2, $3)";
    $datos = [$nombre, $precio, $stock];

    insertar($query_insert, $datos); 

    $_SESSION['mensaje'] = 'Producto ya guardado siii';
    $_SESSION['tipo_mensaje'] = 'bien hecho'; 
//Header como se recuerda permite llevar a la tabla de crud para que Guardar se conecte como un boton
    header('Location: Tabla_Crud.php'); 
    exit;
}
?>