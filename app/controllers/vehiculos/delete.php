<?php

include ('../../config.php');

$id_vehiculo = $_POST['id_vehiculo'];

$sentencia = $pdo->prepare("DELETE FROM tb_vehiculos where id_vehiculo=:id_vehiculo");

$sentencia->bindParam('id_vehiculo', $id_vehiculo);

if($sentencia->execute()){
    session_start();
    $_SESSION['msj'] = "Se elimino el vehiculo de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/vehiculos/');
}else{
    session_start();
    $_SESSION['msj'] = "No se pudo eliminar de la BD";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/vehiculos/delete.php?id='.$id_vehiculo);
}




