<?php

include ('../../config.php');

$empleado_recepciona = $_POST['empleado_recepciona'];
$num_ingreso = $_POST['num_ingreso'];
$kilometraje = $_POST['kilometraje'];
$nivel_combustible = $_POST['nivel_combustible'];
$patente_vehiculo = $_POST['patente_vehiculo'];
$marca_y_modelo = $_POST['marca_y_modelo'];
$nombre_cliente = $_POST['nombre_cliente'];
$id_ingreso = $_POST['id_ingreso'];


$sentencia = $pdo->prepare("UPDATE tb_taller_ingresos
        SET empleado_recepciona=:empleado_recepciona,
            num_ingreso=:num_ingreso,
            kilometraje=:kilometraje,
            nivel_combustible=:nivel_combustible,
            patente_vehiculo=:patente_vehiculo,
            marca_y_modelo=:marca_y_modelo,
            nombre_cliente=:nombre_cliente
        WHERE id_ingreso = :id_ingreso ");


$sentencia->bindParam('empleado_recepciona', $empleado_recepciona);
$sentencia->bindParam('num_ingreso', $num_ingreso);
$sentencia->bindParam('kilometraje', $kilometraje);
$sentencia->bindParam('nivel_combustible', $nivel_combustible);
$sentencia->bindParam('patente_vehiculo', $patente_vehiculo);
$sentencia->bindParam('marca_y_modelo', $marca_y_modelo);
$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('id_ingreso', $id_ingreso);


if($sentencia->execute()) {
    session_start();
    $_SESSION['msj'] = "Se actualizo el ingreso de la manera correcta";
    header('Location: '.$URL.'/taller_ingresos/');
    ?>
    <?php
}else{
    session_start();
    $_SESSION['msj'] = "Se actualizo el ingreso de la manera correcta";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/taller_ingresos/');
}