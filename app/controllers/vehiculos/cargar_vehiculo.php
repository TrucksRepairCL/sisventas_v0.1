<?php

$id_vehiculo_get = $_GET['id'];

$sql_vehiculos = "SELECT * FROM tb_vehiculos where id_vehiculo = '$id_vehiculo_get'";

$query_vehiculos = $pdo-> prepare($sql_vehiculos);
$query_vehiculos->execute();
$vehiculos_datos = $query_vehiculos->fetchAll(PDO::FETCH_ASSOC);

foreach ($vehiculos_datos as $vehiculos_dato) {

    $id_vehiculo = $vehiculos_dato["id_vehiculo"];
    
    $modelo = $vehiculos_dato['modelo'];
    $marca = $vehiculos_dato['marca'];

}


//Warning: Undefined variable $id_ingreso_get in C:\xampp\htdocs\sisventas\app\controllers\taller_ingresos\cargar_ingreso.php on line 5



