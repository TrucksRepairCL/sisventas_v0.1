<?php



$sql_ingresos = "SELECT * FROM tb_taller_ingresos where id_ingreso = '$id_ingreso'";

$query_ingresos = $pdo-> prepare($sql_ingresos);
$query_ingresos->execute();
$ingresos_datos = $query_ingresos->fetchAll(PDO::FETCH_ASSOC);

foreach ($ingresos_datos as $ingreso_dato) {

    $id_ingreso = $ingresos_dato["id_ingreso"];
    
    $nombre_cliente = $ingresos_dato['nombre_cliente'];

}



