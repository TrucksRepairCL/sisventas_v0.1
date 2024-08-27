<?php

include ('../../config.php');

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$imagen = $_POST['imagen'];
$precio_oferta = $_POST['precio_oferta'];
$id_producto = $_POST['id_producto'];



$sentencia = $pdo->prepare("UPDATE tb_almacen_pers
        SET codigo=:codigo,
            nombre=:nombre,
            imagen=:imagen,
            precio_oferta=:precio_oferta
        WHERE id_producto = :id_producto");


$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('imagen', $imagen);
$sentencia->bindParam('precio_oferta', $precio_oferta);
$sentencia->bindParam('id_producto', $id_producto);


if($sentencia->execute()) {
    session_start();
    $_SESSION['msj'] = "Se actualizo el producto de la manera correcta";

    header('Location: '.$URL.'/almacen_p/');
    ?>
    <?php
}else{
    session_start();
    $_SESSION['msj'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen_p/update.php');
}

