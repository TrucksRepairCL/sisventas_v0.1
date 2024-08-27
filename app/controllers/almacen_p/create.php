<?php

include ('../../config.php');

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$imagen = $_POST['imagen'];
$precio_oferta = $_POST['precio_oferta'];


$sentencia = $pdo->prepare("INSERT INTO tb_almacen_pers 
        (codigo, nombre, imagen, precio_oferta)
        VALUES (:codigo,:nombre,:imagen,:precio_oferta)");


$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('imagen', $imagen);
$sentencia->bindParam('precio_oferta', $precio_oferta);


if($sentencia->execute()) {
    header('Location: '.$URL.'/almacen_p/');
    session_start();
    $_SESSION['msj'] = "Se registro el producto de la manera correcta";
}else{
    session_start();
    $_SESSION['msj'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen_p/create.php');
}
