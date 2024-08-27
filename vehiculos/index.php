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
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Vehiculos Registrados</h3>

                            <div class="card-tools">
                                <a href="<?php echo $URL;?>/vehiculos/create.php" class="mr-4">Nuevo</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ingresos" class="table-bordered table-hover table-striped table-sm">
                                <tr>
                                    <th>Version</th>
                                    <th>Patente</th>
                                    <th>Kilometraje</th>
                                    <th>nivel_combustible</th>                                                                        
                                    <th></th>
                                </tr>
                                <tbody>
                                <?php


                                foreach ($vehiculos_datos as $vehiculos_dato) {
                                    $id_vehiculo = $vehiculos_dato['id_vehiculo']; ?>
                                    
                                    <tr>
                                        <td><?php echo $vehiculos_dato['version'];?></td>
                                        <td><?php echo $vehiculos_dato['patente'];?></td>
                                        <td><?php echo $vehiculos_dato['kilometraje'];?></td>
                                        <td><?php echo $vehiculos_dato['nivel_combustible'];?></td>                                                                                
                                                <td><h4>
                                                    <a href="update.php?id=<?php echo $id_vehiculo; ?>"><i class="fa fa-pen-nib"></i></a>
                                                    <a href="delete.php?id=<?php echo $id_vehiculo; ?>"><i class="fa fa-trash"></i></a>
                                                    </h4>
                                                </td>
                                    </tr>
                                    <?php
                                }
                                ?>


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