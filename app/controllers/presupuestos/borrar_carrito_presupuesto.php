<?php

include ('../../config.php');

$id_carrito_presupuesto = $_POST['id_carrito_presupuesto'];

$sentencia = $pdo->prepare("DELETE FROM tb_carrito_presupuesto where id_carrito_presupuesto=:id_carrito_presupuesto");

$sentencia->bindParam('id_carrito_presupuesto', $id_carrito_presupuesto);



if($sentencia->execute()) {
    ?>
    <script>
        location.href = "<?php echo $URL;?>/presupuestos/create.php";
    </script>
    <?php
}else{
    ?>

    <?php
}
