<?php

$id_producto_get = $_GET['id'];

$sql_productos = "SELECT * FROM tb_almacen_pers WHERE id_producto = '$id_producto_get'";

$query_productos = $pdo-> prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato) {

    $id_producto = $productos_dato['id_producto'];
    $codigo = $productos_dato['codigo'];
    $nombre = $productos_dato['nombre'];
    $imagen = $productos_dato['imagen'];
    $precio_oferta = $productos_dato['precio_oferta'];

}