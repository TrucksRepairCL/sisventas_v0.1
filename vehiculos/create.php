<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/vehiculos/listado_vehiculos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo ingreso vehiculo</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-7">
                    <div class="card card-primary">
                        <div class="card-header">

                            <h3 class="card-title">Ingrese datos con cuidado</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="../app/controllers/vehiculos/create.php" method="post">

                                        <div class="row">

                                            <div class="col-md">
                                                <label for="">Marca</label>
                                                <input id="marca" name="marca" type="text" class="form-control">
                                            </div>

                                            <div class="col-md">                                              
                                                <label for="">Modelo</label>
                                                <input id="modelo" name="modelo" type="text" class="form-control"> 
                                            </div>

                                            <div class="col-md">
                                                <label for="">Versión</label>
                                                <input id="version" name="version" type="text" class="form-control"> 
                                            </div>


                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-md">
                                                <label for="">Patente</label>
                                                <input id="patente" name="patente" type="text" class="form-control">
                                            </div>

                                            <div class="col-md">                                              
                                                <label for="">Kilometraje</label>
                                                <input id="kilometraje" name="kilometraje" type="text" class="form-control"> 
                                            </div>

                                            <div class="col-md">
                                                <label for="">Nivel Combustible</label>
                                                <input id="nivel_combustible" name="nivel_combustible" type="text" class="form-control"> 
                                            </div>


                                        </div>                                        

                                        <div class="row-mt-5 text-center">

                                            <div class="col-md mt-5">
                                            </div>

                                            <div class="col-md">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar vehiculo</button>
                                            </div>

                                            <div class="col-md">
                                            </div>

                                        </div>



                                    </form>
                                    <!-- </form> -->
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




