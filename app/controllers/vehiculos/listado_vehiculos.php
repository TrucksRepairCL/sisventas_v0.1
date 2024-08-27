<?php

$sql_vehiculos = "SELECT * FROM tb_vehiculos";
$query_vehiculos = $pdo->prepare($sql_vehiculos);
$query_vehiculos->execute();
$vehiculos_datos = $query_vehiculos->fetchAll(PDO::FETCH_ASSOC);



