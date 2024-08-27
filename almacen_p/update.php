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
                    <h1>Actualizar producto</h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese datos con cuidado</h3>

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
                                    <form action="../app/controllers/almacen_p/update.php" method="post" enctype="multipart/form-data">

                                        <input type="text" value="<?php echo $id_producto_get; ?>" name="id_producto" hidden>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Codigo</label>
                                                <input id="codigo" name="codigo" type="text" class="form-control"
                                                       value="<?php echo $codigo; ?>">
                                            </div>


                                            <div class="col-md-4">
                                                <label for="">Nombre del producto</label>
                                                <input id="nombre" name="nombre" type="text" class="form-control"
                                                       value="<?php echo $nombre; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Precio Oferta</label>
                                                <input id="precio_oferta" name="precio_oferta" type="text" class="form-control"
                                                       value="<?php echo $precio_oferta; ?>">
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-md">

                                            </div>

                                            <div class="col-md">

                                            </div>

                                            <div class="col-md">
                                                <label for="">Imagen</label>
                                                <input id="imagen" name="imagen" type="text" class="form-control"
                                                        value="<?php echo $imagen; ?>">
                                            </div>


                                        </div>



                                        <div class="form-group text-center mt-5">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar Producto</button>
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
