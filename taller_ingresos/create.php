<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/clientes/listado_de_clientes.php');
include('../app/controllers/vehiculos/listado_vehiculos.php');
include('../app/controllers/taller_ingresos/listado_ingresos.php');

?>

<style>
    .lbl_vehiculo {
        color: transparent;
    }

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo ingreso taller</h1>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row mt-4">

                                <div class="col-md">
                                    <?php
                                    $contador_de_ingresos = 0;
                                    foreach ($ingresos_datos as $ingresos_dato) {
                                        $contador_de_ingresos = $contador_de_ingresos + 1;
                                    }
                                    ?>

                                    <h4 class="card-title">
                                        <i class="nav-icon fas fa-shopping-bag"></i> Ingreso Nro
                                    </h4>                                    
                                      
                                </div>
                                <div class="col-md">
                                        <input type="text" class="text-center form-control disabled" value="ING00<?php echo $contador_de_ingresos + 1; ?>" disabled>     
                                </div>
                                <div class="col-md">
                                      
                                </div>                                

                                
                            </div>


                            <div class="row mt-5">
                                <div class="col-md-12">


                                        <div class="row">

                                            <div class="col-md">
                                                <label for="">Empleado recepciona</label>                                                
                                            </div>

                                            <div class="col-md">
                                                <select name="empleado_recepciona" id="empleado_recepciona" class="form-control"> 
                                                <option value=""></option>
                                                <option value="ANA ROMERO NAVARRETE">ANA ROMERO NAVARRETE</option>
                                                <option value="NATALIA VEGA">NATALIA VEGA  </option> 
                                                <option value="BERNABE MONROY">BERNABE MONROY  </option> 
                                                <option value="DAVID GUTIERREZ SOTO">DAVID GUTIERREZ SOTO</option> 
                                                <option value="MATIAS ALEJANDRO RODRIGUEZ PARRA">MATIAS ALEJANDRO RODRIGUEZ PARRA</option> 
                                                <option value="GONZALO BAO">GONZALO BAO </option> 
                                                <option value="JAVIER FERNANDEZ">JAVIER FERNANDEZ  </option> 
                                                <option value="ALBERTO VASQUEZ">ALBERTO VASQUEZ </option> 
                                                <option value="LUIS CERDA">LUIS CERDA </option> 
                                                <option value="MIGUEL ANGEL BELMAR RODRIGUEZ">MIGUEL ANGEL BELMAR RODRIGUEZ</option> 
                                                <option value="FERNANDO CARRASCO">FERNANDO CARRASCO </option> 
                                                </select>  
                                            </div>

                                            <div class="col-md">

                                            </div>


                                        </div>



                                        <div class="row mt-5">

                                            <div class="col-md">                                              
                                                <label for="">Cliente</label>
                                                    <button class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modal-cliente">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                            </div>

                                            <div class="col-md">
                                                <input id="nombre_cliente" name="nombre_cliente" class="form-control" disabled>
                                                <input id="id_cliente" name="id_cliente" type="text" class="form-control" hidden>                                                 
                                                  
                                            </div>

                                            <div class="col-md">
                                            </div>                                     

                                        </div>                                        

                                        <div class="row mt-5">

                                            <div class="col-md">
                                                <label for="">Vehiculo</label>
                                                    <button class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modal-vehiculo">
                                                        <i class="fa fa-search"></i>
                                                    </button>                                                

                                            </div>


                                            <div class="col-md ml-5">

                                                <input id="marca" name="marca"  type="text" class="form-control">
                                                <input id="id_vehiculo" name="id_vehiculo" type="text" class="form-control" hidden>                                                 
                                                  
                                            </div>

                                            <div class="col-md">
                                                <input id="modelo" name="modelo"  type="text" class="form-control" disabled>                                                
                                            </div>



                                            <div class="col-md">
                                                <input id="patente" name="patente"  type="text" class="form-control" disabled>                                                
                                            </div>

                                            <div class="col-md">
                                                  
                                            </div>
                                            
                                            
                                        </div>                                                                                         
                                            
                                </div>
                            </div>

                            


                                        <div class="row-mt-5 text-center">

                                            <div class="col-md mt-5">
                                            </div>

                                            <div class="col-md">
                                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                    <button id="btn_guardar_ingreso" type="submit" class="btn btn-primary">Guardar Ingreso</button>

                                                    <script>
                                                        $('#btn_guardar_ingreso').click(function () {

                                                            var id_cliente = $('#id_cliente').val();
                                                            var id_vehiculo = $('#id_vehiculo').val();
                                                            var empleado_recepciona = $('#empleado_recepciona').val();
                                                            

                                                            if(id_cliente=="") {
                                                                alert("Debe llenar todos los campos");
                                                            }else if(id_vehiculo == ""){
                                                                $('#id_vehiculo').focus();
                                                                alert("Debe llenar todos los campos");
                                                            }else if(empleado_recepciona == ""){
                                                                $('#empleado_recepciona').focus();
                                                                alert("Debe llenar todos los campos");                                                                
                                                            }                                                            
                                                            else {
                                                                var url = "../app/controllers/taller_ingresos/create.php";
                                                                $.get(url,{id_cliente:id_cliente,id_vehiculo:id_vehiculo,empleado_recepciona:empleado_recepciona},function (datos) {
                                                                   $('#respuesta_create').html(datos);
                                                                });
                                                            }
                                                        });


                                                    </script>                                                    
                                            </div>

                                            <div class="col-md">
                                            </div>

                                        </div>                            

                                        <div id="respuesta_create"></div>
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

<div class="modal fade" id="modal-cliente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda del cliente</h4>
                <a href="<?php echo $URL;?>/clientes/create.php" target="_blank">
                    <button type="button" class="btn btn-primary ml-2">
                        <i class="fa fa-users"></i>
                        agregar nuevo cliente
                    </button>
                </a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table table-responsive">

                    <table id="clientes" class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Seleccionar</th>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Celular</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador_de_clientes = 0;
                        foreach ($clientes_datos as $clientes_dato) {
                            $id_cliente = $clientes_dato['id_cliente'];
                            $contador_de_clientes = $contador_de_clientes + 1; ?>
                        <tr>
                            <td><center><?php echo $contador_de_clientes; ?></center></td>
                            <td>
                                <center>
                                    <button id="btn_pasar_cliente<?php echo $id_cliente; ?>" class="btn btn-info">Seleccionar</button>
                                    <script>
                                        $('#btn_pasar_cliente<?php echo $id_cliente;?>').click(function () {

                                            var id_cliente = '<?php echo $clientes_dato['id_cliente']; ?>';
                                            $('#id_cliente').val(id_cliente);

                                            var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente']; ?>';
                                            $('#nombre_cliente').val(nombre_cliente);

                                            var rut_cliente = '<?php echo $clientes_dato['rut_cliente']; ?>';
                                            $('#rut_cliente').val(rut_cliente);

                                            var telefono_movil = '<?php echo $clientes_dato['telefono_movil']; ?>';
                                            $('#telefono_movil').val(telefono_movil);

                                            $('#modal-cliente').modal('toggle');
                                        });
                                    </script>
                                </center>
                            </td>
                            <td><?php echo $clientes_dato['nombre_cliente']; ?></td>
                            <td><?php echo $clientes_dato['rut_cliente']; ?></td>
                            <td><?php echo $clientes_dato['telefono_movil']; ?></td>
                        </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>

    </div>

</div>

<div class="modal fade" id="modal-vehiculo">
    <div class="modal-dialog modal-vehiculo">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda del vehiculo</h4>
                <a href="<?php echo $URL;?>/vehiculos/create.php" target="_blank">
                    <button type="button" class="btn btn-primary ml-2">
                        <i class="fa fa-users"></i>
                        agregar nuevo vehiculo
                    </button>
                </a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table table-responsive">

                    <table id="vehiculos" class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Seleccionar</th>
                            <th>Patente</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador_de_vehiculos = 0;
                        foreach ($vehiculos_datos as $vehiculos_dato) {
                            $id_vehiculo = $vehiculos_dato['id_vehiculo'];
                            $contador_de_vehiculos = $contador_de_vehiculos + 1; ?>
                        <tr>
                            <td><center><?php echo $contador_de_vehiculos; ?></center></td>
                            <td>
                                <center>
                                    <button id="btn_pasar_vehiculo<?php echo $id_vehiculo; ?>" class="btn btn-info">Seleccionar</button>
                                    
                                    <script>
                                        $('#btn_pasar_vehiculo<?php echo $id_vehiculo;?>').click(function () {

                                            var id_vehiculo = '<?php echo $vehiculos_dato['id_vehiculo']; ?>';
                                            $('#id_vehiculo').val(id_vehiculo);

                                            var marca = '<?php echo $vehiculos_dato['marca']; ?>';
                                            $('#marca').val(marca);

                                            var modelo = '<?php echo $vehiculos_dato['modelo']; ?>';
                                            $('#modelo').val(modelo);

                                            var patente = '<?php echo $vehiculos_dato['patente']; ?>';
                                            $('#patente').val(patente);

                                            $('#modal-vehiculo').modal('toggle');
                                        });
                                    </script> 
                                </center>
                            </td>
                            <td><?php echo $vehiculos_dato['patente']; ?></td>
                        </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>

    </div>

</div>

<?php include('../layout/parte2.php'); ?>

<script>
    $(function () {

        $("#vehiculos").DataTable({
            "responsive": true,"paging": true,"lengthChange": false, "autoWidth": false,
            "pageLength": 7,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#prodss_wrapper .col-md-6:eq(0)');



    });

    $(function () {

        $("#clientes").DataTable({
            "responsive": true,"paging": true,"lengthChange": false, "autoWidth": false,
            "pageLength": 7,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#prodss_wrapper .col-md-6:eq(0)');



    });
</script>




