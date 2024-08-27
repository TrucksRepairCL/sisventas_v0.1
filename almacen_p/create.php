<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/almacen_p/listado_de_productos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo producto personalizado</h1>
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
                    <div class="card card-primary">
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
                                    <form action="../app/controllers/almacen_p/create.php" method="post">

                                        <div class="row">

                                            <div class="col-md">
                                                <label for="">Codigo</label>
                                                <input id="codigo" name="codigo" type="text" class="form-control">
                                            </div>

                                            <div class="col-md">
                                                <label for="">Nombre</label>
                                                <input id="nombre" name="nombre" type="text" class="form-control">
                                            </div>

                                            <div class="col-md">
                                                <label for="">Imagen</label>
                                                <input id="imagen" name="imagen" type="text" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row mt-5">

                                            <div class="col-md">


                                            </div>

                                            <div class="col-md">
                                                <label for="">Precio Oferta</label>
                                                <input id="precio_oferta" name="precio_oferta" type="text" class="form-control">                                                
                                            </div>

                                            <div class="col-md">
                                            
                                            </div>


                                        </div>

                                        <div class="row-mt-5 text-center">

                                            <div class="col-md mt-5">
                                            </div>

                                            <div class="col-md">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                            </div>

                                            <div class="col-md">
                                            </div>

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
