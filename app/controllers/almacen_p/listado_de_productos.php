<?php

$sql_productos = "SELECT apers.id_producto as id_producto, apers.nombre as nombre, apers.codigo as codigo, apers.imagen as imagen , apers.precio_oferta as precio_oferta FROM tb_almacen_pers as apers";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

