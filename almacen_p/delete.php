<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/almacen_p/cargar_producto.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-8">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de que desea eliminar el producto <b><?php echo $nombre; ?></b>?</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/almacen_p/delete.php" method="post">
                                        <input type="text" name="id_producto" value="<?php echo $id_producto_get;?>" hidden>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Codigo</label>
                                                <input id="codigo" name="codigo" type="text" class="form-control"
                                                       value="<?php echo $codigo; ?>" disabled>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Nombre</label>
                                                <input id="nombre" name="nombre" type="text" class="form-control"
                                                       value="<?php echo $nombre; ?>" disabled>
                                                </select>
                                            </div>

                                            <div class="col-md-4">

                                                <label for="">Precio oferta</label>
                                                <input id="precio_oferta" name="precio_oferta" type="text" class="form-control"
                                                       value="<?php echo $precio_oferta; ?>" disabled>
                                            </div>

                                        </div>


                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Borrar Producto</button>
                                        </div>
                                    </form>
                                </div>
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
