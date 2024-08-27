<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/taller_ingresos/cargar_ingreso.php');

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
                            <h3 class="card-title">Datos del ingreso <b><?php echo $nombre_cliente;?></b> a ser eliminado</h3>

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
                                    <form action="../app/controllers/taller_ingresos/delete.php" method="post">


                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <label for="">Empleado Recepciona</label>
                                                <input id="empleado_recepciona" name="empleado_recepciona" type="text" class="form-control"
                                                       value="<?php echo $empleado_recepciona; ?>">
                                            </div>


                                            <div class="col-md-4">
                                                <label for="">Num Ingreso</label>
                                                <input id="num_ingreso" name="num_ingreso" type="text" class="form-control"
                                                       value="<?php echo $num_ingreso; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Kilometraje</label>
                                                <input id="kilometraje" name="kilometraje" type="text" class="form-control"
                                                       value="<?php echo $kilometraje; ?>">
                                            </div>                                            
                                        </div>



                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <label for="">Nivel combustible</label>
                                                <input id="nivel_combustible" name="nivel_combustible" type="text" class="form-control"
                                                       value="<?php echo $nivel_combustible; ?>">
                                            </div>


                                            <div class="col-md-4">
                                                <label for="">Patente vehiculo</label>
                                                <input id="patente_vehiculo" name="patente_vehiculo" type="text" class="form-control"
                                                       value="<?php echo $patente_vehiculo; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Marca y modelo</label>
                                                <input id="marca_y_modelo" name="marca_y_modelo" type="text" class="form-control"
                                                       value="<?php echo $marca_y_modelo; ?>">
                                            </div>                                            
                                        </div>




                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Borrar Ingreso</button>
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
