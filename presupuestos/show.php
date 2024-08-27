<?php

$id_presupuesto_get = $_GET['id_presupuesto'];

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/presupuestos/cargar_presupuesto.php');
include('../app/controllers/clientes/cargar_clientev.php');
?>

<!-- Content Wrapper. Contains page content -->

<style type="text/css">

    .tbl_prods {
        background-color: #e7e7e7;
        text-align: center;
    }

    .tbl_prods_total_text {
        background-color: #e7e7e7;
        text-align: right;
    }

    .tbl_prods_total {
        background-color: #e7e7e7;
        text-align: center;
    }

    #stock_actual {
        background-color: #ffec14;
        text-align: center;
    }

</style>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Detalle del presupuesto <?= $nro_presupuesto; ?> </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-outline card-primary">

                            <div class="card-header">
                                <?php
                                $contador_de_presupuestos = 0;
                                foreach ($presupuestos_datos as $presupuesto_dato) {
                                    $contador_de_presupuestos = $contador_de_presupuestos + 1;
                                }
                                ?>

                                <h4 class="card-title">
                                    <i class="nav-icon fas fa-shopping-bag"></i> Presupuesto Nro
                                    <input type="text" class="text-center" disabled value="<?= $nro_presupuesto; ?>">
                                </h4>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>

                        <div class="card-body">
                            <!-- /.card-body -->
                            <b>Carrito Presupuesto</b>

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th class="tbl_prods">Nro</th>
                                        <th class="tbl_prods">Producto</th>
                                        <th class="tbl_prods">Cantidad</th>
                                        <th class="tbl_prods">Precio Unitario</th>
                                        <th class="tbl_prods">Precio SubTotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador_de_carrito_presupuesto = 0;
                                    $cantidad_total = 0;
                                    $precio_unitario_total = 0;
                                    $precio_total = 0;

                                    $sql_carrito_presupuesto = "SELECT *,pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta,
                                                    pro.stock as stock, pro.id_producto as id_producto
                                                    FROM tb_carrito_presupuesto AS carrpres INNER JOIN tb_almacen as pro 
                                                    ON carrpres.id_producto = pro.id_producto WHERE nro_presupuesto = '$nro_presupuesto' 
                                                    ORDER BY id_carrito_presupuesto ASC";
                                    $query_carrito_presupuesto = $pdo->prepare($sql_carrito_presupuesto);
                                    $query_carrito_presupuesto->execute();
                                    $carrito_presupuesto_datos = $query_carrito_presupuesto->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($carrito_presupuesto_datos as $carrito_presupuesto_dato) {
                                        $id_carrito_presupuesto = $carrito_presupuesto_dato['id_carrito_presupuesto'];
                                        $contador_de_carrito_presupuesto = $contador_de_carrito_presupuesto + 1;
                                        $cantidad_total = $cantidad_total + $carrito_presupuesto_dato['cantidad'];
                                        $precio_unitario_total = $precio_unitario_total + floatval($carrito_presupuesto_dato['precio_venta']);
                                        ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador_de_carrito_presupuesto; ?></center>
                                                <input type="text" value="<?php echo $carrito_presupuesto_dato['id_producto']; ?>" id="id_producto<?php echo $contador_de_carrito_presupuesto; ?>"hidden>
                                            </td>
                                            <td><?php echo $carrito_presupuesto_dato['nombre_producto']; ?></td>
                                            <td>
                                                <center>
                                                    <span id="cantidad_carrito_presupuesto<?php echo $contador_de_carrito_presupuesto; ?>"><?php echo $carrito_presupuesto_dato['cantidad'] ?></span>

                                                    <input type="text" value="<?php echo $carrito_presupuesto_dato['stock']?>"
                                                           id="stock_de_inventario<?php echo $contador_de_carrito_presupuesto; ?>" hidden>

                                                </center>
                                            </td>
                                            <td><center><?php echo $carrito_presupuesto_dato['precio_venta'] ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                    $cantidad = floatval($carrito_presupuesto_dato['cantidad']);
                                                    $precio_venta = floatval($carrito_presupuesto_dato['precio_venta']);
                                                    echo $subtotal = $cantidad * $precio_venta;
                                                    $precio_total = $precio_total + $subtotal;
                                                    ?>
                                                </center>
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th class="tbl_prods_total_text" colspan="2">Total</th>

                                        <th class="tbl_prods_total">
                                            <?php echo $cantidad_total; ?>
                                        </th>

                                        <th class="tbl_prods_total">
                                            <?php echo $precio_unitario_total; ?>
                                        </th>

                                        <th style="background-color: #fff815" class="tbl_prods_total">
                                            <?php echo $precio_total; ?>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        </div>

                        <!-- row -->
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-9">

                        <div class="card card-outline card-primary">

                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="nav-icon fas fa-user"></i>
                                    Cliente
                                </h4>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>

                            <?php
                            foreach ($clientes_datos as $clientes_dato) {
                                $nombre_cliente = $clientes_dato['nombre_cliente'];
                                $rut_cliente = $clientes_dato['rut_cliente'];
                                $ciudad_cliente = $clientes_dato['ciudad_cliente'];
                                $telefono_movil = $clientes_dato['telefono_movil'];
                            }
                            ?>


                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- /.card-body -->
                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label>Nombre / Razon Social</label>
                                            <input type="text" value="<?php echo $nombre_cliente; ?>"
                                                   id="nombre_cliente" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Rut Empresa</label>
                                            <input type="text" value="<?php echo $rut_cliente; ?>"
                                                   id="rut_cliente" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Ciudad </label>
                                            <input type="text" value="<?php echo $ciudad_cliente; ?>"
                                                   id="ciudad_cliente" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Celular </label>
                                            <input type="text" value="<?php echo $telefono_movil; ?>"
                                                   id="telefono_movil" class="form-control" disabled>
                                        </div>
                                    </div>


                                </div>

                            </div>


                        </div>

                        <!-- row -->
                    </div>

                    <div class="col-md-3">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-shopping-basket"></i> </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>
                            <!-- /.card-tools -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Monto cancelado</label>
                                    <input type="text" class="form-control" id="total_pagado" style="text-align: center; background-color: #fff819"
                                           value="<?php echo $precio_total; ?>">
                                </div>
                                <hr>

                                <div class="form-group"></div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


</div><!-- /.container-fluid -->


<?php include('../layout/parte2.php'); ?>