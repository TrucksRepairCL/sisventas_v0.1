<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/presupuestos/listado_de_presupuestos.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    if(isset($_SESSION['msj'])){
                        $respuesta = $_SESSION['msj']; ?>
                        <script>
                            Swal.fire({
                                title: '<?php echo $respuesta; ?>',
                                icon: 'success',
                                timer: 2000,
                                buttons: false,
                            })
                        </script>
                        <?php
                        unset($_SESSION['msj']);
                    }
                    ?>

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
                            <h3 class="card-title">Presupuestos registrados </h3>

                            <div class="card-tools">
                                <a href="<?php echo $URL;?>/presupuestos/create.php" class="mr-4">Nuevo</a>
                                <a href="<?php echo $URL;?>/#" class="mr-4">Version PDF</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div class="table table-responsive">
                                <table id="presupuestos" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th><center>N° PRESUPUESTO</center></th>
                                        <th><center></center></th>
                                        <th><center>CLIENTE</center></th>
                                        <th><center>TOTAL</center></th>
                                        <th><center>FECHA</center></th>
                                        <th><center></center></th>
                                        <th><center></center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;

                                    foreach ($presupuestos_datos as $presupuestos_dato) {
                                        $id_presupuesto = $presupuestos_dato['id_presupuesto'];
                                        $contador = $contador + 1;
                                        ?>
                                        <tr>
                                            <td><center>
                                                <a href="show.php?id_presupuesto=<?php echo $id_presupuesto; ?>">
                                                PPT0<?php echo $presupuestos_dato['nro_presupuesto']; ?>                                                   
                                                </a>
                                                    
                                                </center>
                                            </td>
                                            <td><center><h3>
                                                        <a href="presupuesto.php?id_presupuesto=<?php echo $id_presupuesto; ?>&nro_presupuesto=<?php echo $nro_presupuesto; ?>"> <i class="fa fa-file-pdf"></i> </a>                                                   
                                                </h3></center>
                                            </td>                                            
                                            <td>
                                                <center>

                                                    <button class="btn btn-primary"
                                                            data-toggle="modal" data-target="#modal-productos<?php echo $id_presupuesto; ?>">
                                                        <i class="fa fa-shopping-basket"></i> Productos
                                                    </button>

                                                    <div class="modal fade" id="modal-productos<?php echo $id_presupuesto; ?>" tabindex="-1" role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #08c2ec">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Productos de la venta <?php echo $id_presupuesto; ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="table table-responsive">
                                                                        <table class="table table-bordered table-sm table-hover table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="tbl_prods">Nro</th>
                                                                                <th class="tbl_prods">Codigo</th>
                                                                                <th class="tbl_prods">Producto</th>
                                                                                <th class="tbl_prods">Ctd</th>
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

                                                                        $nro_presupuesto = $presupuestos_dato['nro_presupuesto'];
                                                                        $sql_carrito_presupuesto = "SELECT *,pro.nombre as nombre_producto, pro.sku as sku, pro.descripcion as descripcion, pro.precio_venta as precio_venta,
                                                                                        pro.stock as stock, pro.id_producto as id_producto
                                                                                        FROM tb_carrito_presupuesto AS carrp INNER JOIN tb_almacen as pro 
                                                                                        ON carrp.id_producto = pro.id_producto WHERE nro_presupuesto = '$nro_presupuesto' ";
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
                                                                                    <td><?php echo $carrito_presupuesto_dato['sku']; ?></td>
                                                                                    <td><?php echo $carrito_presupuesto_dato['nombre_producto']; ?></td>
                                                                                    <td>
                                                                                        <center>
                                                                                            <span id="cantidad_carrito<?php echo $contador_de_carrito_presupuesto; ?>"><?php echo $carrito_presupuesto_dato['cantidad'] ?></span>

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
                                                                                <th class="tbl_prods_total_text" colspan="3">
                                                                                    <div class="float-right">Total</div>
                                                                                </th>

                                                                                <th class="tbl_prods_total">
                                                                                    <center><?php echo $cantidad_total; ?></center>
                                                                                </th>

                                                                                <th class="tbl_prods_total">
                                                                                    <center><?php echo $precio_unitario_total; ?></center>
                                                                                </th>

                                                                                <th style="background-color: #fff815" class="tbl_prods_total">
                                                                                    <center><?php echo $precio_total; ?></center>
                                                                                </th>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center><?php echo $presupuestos_dato['nombre_cliente']; ?></center>
                                            </td>
                                            <td>
                                                <center>$ <?php echo $presupuestos_dato['total_presupuesto']; ?></center>
                                            </td>

                                            <td>
                                                <center><?php echo $presupuestos_dato['fyh_creacion']; ?></center>
                                            </td>

                                            <td>
                                            <center>
                                            <a href="delete.php?id_presupuesto=<?php echo $id_presupuesto; ?>">
                                                <h3><i class="fa fa-trash"></i></h3>
                                            </a>
                                            </center>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>

                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include('../layout/parte2.php'); ?>



<script>
    $(function () {

        $("#presupuestos").DataTable({
            "responsive": true,"paging": true,"lengthChange": false, "autoWidth": false,
            "order": [[0, 'desc']],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#prodss_wrapper .col-md-6:eq(0)');



    });
</script>