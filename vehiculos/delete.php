<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/vehiculos/cargar_vehiculo.php');

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

                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Datos del vehiculo <b><?php echo $marca; $modelo;?></b> a ser eliminado</h3>

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
                                    <form action="../app/controllers/vehiculos/delete.php" method="post">
                                        <input type="text" name="id_vehiculo" value="<?php echo $id_vehiculo_get;?>" hidden>

                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <label for="">Marca y modelo</label>
                                                <input type="text" class="form-control" name="marca" value="<?php echo $marca;?> <?php echo $modelo;?>">
                                            </div>

                                            <div class="col-md-4">

                                            </div>

                                            <div class="col-md-4">

                                            </div>

                                        </div>


                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                            </div>

                                            <div class="col-md-8">
                                            </div>

                                        </div>

                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Borrar Vehiculo</button>
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
