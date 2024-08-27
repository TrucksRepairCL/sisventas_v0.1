<?php

include ('../../config.php');


$id_cliente = $_GET['id_cliente'];
$id_vehiculo = $_GET['id_vehiculo'];
$empleado_recepciona = $_GET['empleado_recepciona'];


$sentencia = $pdo->prepare("INSERT INTO tb_taller_ingresos 
        (id_cliente, id_vehiculo, empleado_recepciona)
        VALUES (:id_cliente,:id_vehiculo,:empleado_recepciona)");


$sentencia->bindParam('empleado_recepciona', $empleado_recepciona);
$sentencia->bindParam('id_cliente', $id_cliente);
$sentencia->bindParam('id_vehiculo', $id_vehiculo);


if($sentencia->execute()) {
    session_start();
    $_SESSION['icono'] = "success";
    $_SESSION['msj'] = "Se registro el ingreso de la manera correcta";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/taller_ingresos/";
    </script>    
    <?php 
}else{
    session_start();
    $_SESSION['msj'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/taller_ingresos/create.php');
    ?>

    <?php
}




