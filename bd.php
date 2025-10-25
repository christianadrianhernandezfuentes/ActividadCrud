<?php

$conexion = pg_connect("host=localhost port=5432 dbname=Productos_gaming user=postgres password=chris123");


if (!$conexion) {
    die("Como que error hombre el bd.php anda mal.");
}

function insertar($query, $datos) {
    global $conexion;
    if (!$conexion) return;
    pg_prepare($conexion, "", $query);
    pg_execute($conexion, "", $datos);
}

function eliminar($query, $datos) {
    global $conexion;
    if (!$conexion) return;
    pg_prepare($conexion, "", $query);
    pg_execute($conexion, "", $datos);
}

function seleccionar($query, $datos = []) { 
    global $conexion;
    if (!$conexion) return false;
    pg_prepare($conexion, "", $query);
    return pg_execute($conexion, "", $datos); 
}

function actualizar($query, $datos) {
    global $conexion;
    if (!$conexion) return;
    pg_prepare($conexion, "", $query);
    pg_execute($conexion, "", $datos);
}

?>
