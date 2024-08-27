<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/almacen_p/listado_de_productos.php');
?>

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
                            <h3 class="card-title">Lista Personalizada </h3>

                            <div class="card-tools">
                                <a href="<?php echo $URL;?>/almacen_p/create.php" class="mr-4">Nuevo Producto</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <table id="prods" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>CODIGO</th>
                                    <th>NOMBRE</th>
                                    <th class="text-center">IMG</th>
                                    <th>$ OFERTA</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($productos_datos as $productos_dato) {
                                    $id_producto = $productos_dato['id_producto'] ?>
                                    <tr>
                                        <td><?php echo $productos_dato['codigo'];?></td>
                                        <td><?php echo $productos_dato['nombre'];?></td>
                                        <td class="text-center">
                                            <h3>
                                                <a href="<?php echo $productos_dato['imagen'];?>" target="_blank"><i class="fa fa-eye"></i></a>
                                            </h3>
                                        </td>
                                        <td><?php echo $productos_dato['precio_oferta'];?></td>

                                        <td class="text-center">
                                            <h3>
                                            <a href="update.php?id=<?php echo $id_producto; ?>">
                                                <i class="fa fa-pen-nib"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo $id_producto; ?>">
                                                <i class="fa fa-trash"></i> 
                                            </a>
                                            </h3>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


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


<?php include('../layout/parte2.php'); ?>

<script>
    $(function () {

        $("#prods").DataTable({
            "responsive": true,"paging": true,"lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#prods_wrapper .col-md-6:eq(0)');



    });
</script>
