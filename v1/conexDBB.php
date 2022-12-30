<?php 
$host_db = "localhost";
$user_db = "TU_USUARIO_DE_BDD";
$pass_db = "TU_CLAVE_DE_BDD";
$db_name = "EL_NOMBRE_DE_TU_BDD";


$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
} 

 ?>