<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Libreria Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>


<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->

<body class="hold-transition dark-mode sidebar-mini">

<div class="wrapper">


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo $URL;?>" class="brand-link">
            <img src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Sis Ventas</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info text-white">
                    bienvenido <br>
                    <b><?php echo $nombres_sesion; ?></b>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item menu">
                    <a href="#" class="nav-link active">
                      <p>
                        Gestión
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/clientes" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gestionar Clientes</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index2.html" class="nav-link disabled">
                          
                          <u>Planificación</u>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Agenda</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Estadisticas</p>
                        </a>
                      </li>                      
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a href="#" class="nav-link active">
                      <p>
                        Taller
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/taller_ingresos/create.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Nuevo ingreso a taller</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/taller_ingresos/index.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Buscar ingreso</p>
                        </a>
                      </li>                  
                    </ul>
                  </li>


                  <li class="nav-item menu">
                    <a href="#" class="nav-link active">
                      <p>
                        Almacen
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link disabled">
                          <u>Compras</u>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/compras" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gestionar compras</p>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/compras" class="nav-link disabled">
                          <u>Recepción de repuestos</u>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $URL;?>/compras" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gestionar recepción de repuestos</p>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link disabled">
                          <u>Repuestos</u>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gestionar Repuestos</p>
                        </a>
                      </li>
                    </ul>                                          
                  </li>                  






                    <li class="nav-item">
                        <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link">
                            <i class="nav-icon fas fa-door-closed"></i>
                            Cerrar Sesión
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>