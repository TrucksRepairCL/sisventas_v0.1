<?php
include('../app/config.php');

include('../layout/sesion.php');

include('../layout/parte1.php');

?>


<div class="content-wrapper">

        <div class="container-fluid">
        	
			<h1 class="text-center">Control Meli</h1>
			<h3 class="text-center">Precios</h3>        	

        </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-outline">

            	<div class="row mt-3">

            		<div class="col-md">
            			
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Description</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Vendidos meli rebuscados</td>
                      <td>
                      		<li>manguera</li>
                      		<li>tapon caja cambios</li>
                      		<li>reten caja dire</li>
                      </td>
                      <td><span class="badge bg-warning">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Ultima mercancia rebuscados</td>
                      <td>
                      		<li>manguera</li>
                      		<li>tapon caja cambios</li>
                      		<li>reten caja dire</li>
                      </td>
                      <td><span class="badge bg-danger">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Vendidos meli TOP</td>
                      <td>
                      		<li>manguera</li>
                      		<li>tapon caja cambios</li>
                      		<li>reten caja dire</li>
                      </td>
                      <td><span class="badge bg-warning">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Ultima mercancia mayor stock</td>
                      <td>
                      		<li>manguera</li>
                      		<li>tapon caja cambios</li>
                      		<li>reten caja dire</li>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>

            		</div>
            		
            		<div class="col-md">


            		</div>






            	</div>
            	
            </div>

        </div>

    </div>

</div>



<?php include('../layout/parte2.php'); ?>