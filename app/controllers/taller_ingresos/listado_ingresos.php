<?php

$sql_ingresos = "SELECT * FROM tb_taller_ingresos";
$query_ingresos = $pdo->prepare($sql_ingresos);
$query_ingresos->execute();
$ingresos_datos = $query_ingresos->fetchAll(PDO::FETCH_ASSOC);