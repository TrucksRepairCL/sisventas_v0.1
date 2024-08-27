<?php

include ('../../config.php');

$id = $_POST['id'];
$sku = $_POST['sku'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$id_categoria = $_POST['id_categoria'];
$id_producto = $_POST['id_producto'];


$sentencia = $pdo->prepare("UPDATE tb_almacen
        SET id=:id,
            sku=:sku,
            nombre=:nombre,
            descripcion=:descripcion,
            ubicacion=:ubicacion,
            stock=:stock,
            stock_minimo=:stock_minimo,
            precio_compra=:precio_compra,
            precio_venta=:precio_venta,
            id_categoria=:id_categoria
        WHERE id_producto = :id_producto ");


$sentencia->bindParam('id', $id);
$sentencia->bindParam('sku', $sku);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('ubicacion', $ubicacion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('id_producto', $id_producto);


if($sentencia->execute()) {
    session_start();
    $_SESSION['msj'] = "Se actualizo el producto de la manera correcta";

    header('Location: '.$URL.'/taller_ingresos/');
    ?>
    <?php
}else{
    session_start();
    $_SESSION['msj'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/taller_ingresos.php');
}


