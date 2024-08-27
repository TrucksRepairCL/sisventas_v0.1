<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/taller_ingresos/listado_ingresos.php');
?>
 

<style>
    
#busqueda {

    /* display: none; */

    display: block;
}

</style>


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
                            <h3 class="card-title">Ingresos de taller</h3>

                            <div class="card-tools">

                            </div>
                            <!-- /.card-tools -->


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Datos del ingreso..." aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button onclick="myFunction()" class="btn btn-outline-secondary" type="button" id="btn_buscar">Buscar</button>
                            </div>


                            <h1 class="text-center">Div busqueda</h1>                            

                            <div id="busqueda" class="table table-responsive">
                                <table id="ingresos2" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Empleado recepciona</th>
                                    <th>Id cliente</th>
                                </tr>                                    
                                </thead>
                                <tbody>
                                <?php

                                foreach ($ingresos_datos as $ingresos_dato) {
                                    $id_ingreso = $ingresos_dato['id_ingreso']; ?>
                                    
                                    <tr>
                                        <td><center><?php echo $id_ingreso; ?></center></td>
                                        <td><?php echo $ingresos_dato['empleado_recepciona'];?></td>
                                        <td><?php echo $ingresos_dato['id_cliente'];?></td>
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


</div>


<?php include('../layout/parte2.php'); ?>    


<script>

function myFunction() {
  var x = document.getElementById("busqueda");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} 


    $(function () {

        $("#ingresos2").DataTable({
            "responsive": true,"paging": true,"lengthChange": false, "autoWidth": false,
            "order": [[0, 'desc']],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ingresos_wrapper .col-md-6:eq(0)');



    });
</script>