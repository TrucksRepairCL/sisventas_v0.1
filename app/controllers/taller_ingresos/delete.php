<?php

include ('../../config.php');

$id_ingreso = $_POST['id_ingreso'];

$sentencia = $pdo->prepare("DELETE FROM tb_taller_ingresos where id_ingreso=:id_ingreso");

$sentencia->bindParam('id_ingreso', $id_ingreso);

if($sentencia->execute()){
    session_start();
    $_SESSION['msj'] = "Se elimino el ingreso de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/taller_ingresos/');
}else{
    session_start();
    $_SESSION['msj'] = "No se pudo eliminar de la BD";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/taller_ingresos/delete.php?id='.$id_ingreso);
}


