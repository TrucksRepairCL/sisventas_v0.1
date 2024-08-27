<?php

$id_ingreso_get = $_GET['id'];

$sql_ingresos = "SELECT * FROM tb_taller_ingresos where id_ingreso = '$id_ingreso_get'";

$query_ingresos = $pdo-> prepare($sql_ingresos);
$query_ingresos->execute();
$ingresos_datos = $query_ingresos->fetchAll(PDO::FETCH_ASSOC);

foreach ($ingresos_datos as $ingresos_dato) {

    $id_ingreso = $ingresos_dato["id_ingreso"];
    
    $empleado_recepciona = $ingresos_dato['empleado_recepciona'];
    $num_ingreso = $ingresos_dato['num_ingreso'];
    $kilometraje = $ingresos_dato['kilometraje'];
    $nivel_combustible = $ingresos_dato['nivel_combustible'];
    $patente_vehiculo = $ingresos_dato['patente_vehiculo'];
    $marca_y_modelo = $ingresos_dato['marca_y_modelo'];
    $nombre_cliente = $ingresos_dato['nombre_cliente'];

}


//Warning: Undefined variable $id_ingreso_get in C:\xampp\htdocs\sisventas\app\controllers\taller_ingresos\cargar_ingreso.php on line 5

















