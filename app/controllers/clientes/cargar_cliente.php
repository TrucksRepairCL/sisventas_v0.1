<?php

$id_cliente_get = $_GET['id'];

$sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente_get'";


$query_clientes = $pdo-> prepare($sql_clientes);
$query_clientes->execute();
$clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);


foreach ($clientes_datos as $clientes_dato) {

	$id_cliente = $clientes_dato['id_cliente'];

	$nombre_cliente = $clientes_dato['nombre_cliente'];
	$rut_cliente = $clientes_dato['rut_cliente'];
	$ciudad_cliente = $clientes_dato['ciudad_cliente'];
	$direccion_cliente = $clientes_dato['direccion_cliente'];
	$giro_cliente = $clientes_dato['giro_cliente'];
	$telefono_movil = $clientes_dato['telefono_movil'];

}

