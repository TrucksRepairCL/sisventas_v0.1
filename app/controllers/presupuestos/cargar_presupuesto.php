<?php

//$id_venta_get = $_GET['id'];

$sql_presupuestos = "SELECT *, cli.nombre_cliente as nombre_cliente
                FROM tb_presupuestos as pre INNER JOIN tb_clientes as cli ON cli.id_cliente = pre.id_cliente where pre.id_presupuesto = '$id_presupuesto_get'";

$query_presupuestos = $pdo-> prepare($sql_presupuestos);
$query_presupuestos->execute();
$presupuestos_datos = $query_presupuestos->fetchAll(PDO::FETCH_ASSOC);

foreach ($presupuestos_datos as $presupuestos_dato) {

    $nro_presupuesto = $presupuestos_dato['nro_presupuesto'];
    $id_cliente = $presupuestos_dato['id_cliente'];

}
