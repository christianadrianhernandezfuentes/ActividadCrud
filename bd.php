<?php

$host = getenv('DB_HOST') ?: "localhost";
$port = getenv('DB_PORT') ?: "5432";
$dbname = getenv('DB_NAME') ?: "Productos_gaming";
$user = getenv('DB_USER') ?: "postgres";
$password = getenv('DB_PASSWORD') ?: "chris123";

$cadena_conexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadena_conexion);

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