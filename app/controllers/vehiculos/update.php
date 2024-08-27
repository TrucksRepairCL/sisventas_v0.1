<?php

include ('../../config.php');

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$version = $_POST['version'];
$patente = $_POST['patente'];
$kilometraje = $_POST['kilometraje'];
$nivel_combustible = $_POST['nivel_combustible'];


$sentencia = $pdo->prepare("UPDATE tb_vehiculos
        SET marca=:marca,
            modelo=:modelo,
            version=:version,
            patente=:patente,
            kilometraje=:kilometraje,
            nivel_combustible=:nivel_combustible,
        WHERE id_vehiculo = :id_vehiculo ");


$sentencia->bindParam('marca', $marca);
$sentencia->bindParam('modelo', $modelo);
$sentencia->bindParam('version', $version);
$sentencia->bindParam('patente', $patente);
$sentencia->bindParam('kilometraje', $kilometraje);
$sentencia->bindParam('nivel_combustible', $nivel_combustible);




if($sentencia->execute()) {
    session_start();
    $_SESSION['msj'] = "Se actualizo el vehiculo de la manera correcta";
    header('Location: '.$URL.'/taller_ingresos/');
    ?>
    <?php
}else{
    session_start();
    $_SESSION['msj'] = "Se actualizo el vehiculo de la manera correcta";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/taller_ingresos/');
}