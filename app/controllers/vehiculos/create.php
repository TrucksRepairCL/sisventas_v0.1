<?php

include ('../../config.php');

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$version = $_POST['version'];
$patente = $_POST['patente'];
$kilometraje = $_POST['kilometraje'];
$nivel_combustible = $_POST['nivel_combustible'];


$sentencia = $pdo->prepare("INSERT INTO tb_vehiculos 
        (marca, modelo, version, patente, kilometraje, nivel_combustible)
        VALUES (:marca,:modelo,:version,:patente,:kilometraje,:nivel_combustible)");


$sentencia->bindParam('marca', $marca);
$sentencia->bindParam('modelo', $modelo);
$sentencia->bindParam('version', $version);
$sentencia->bindParam('patente', $patente);
$sentencia->bindParam('kilometraje', $kilometraje);
$sentencia->bindParam('nivel_combustible', $nivel_combustible);



if($sentencia->execute()) {
    header('Location: '.$URL.'/vehiculos/');
    session_start();
    $_SESSION['msj'] = "Se registro el vehiculo de la manera correcta";
}else{
    session_start();
    $_SESSION['msj'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/vehiculos/create.php');
    ?>

    <?php
}