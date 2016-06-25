<?php
session_start () ;

if ( ! $_SESSION )
{
    ?>
    <script language = javascript>
        location.href = 'login.php';
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head.php' ; ?>
        <title>SGSST - Examanes </title>
    </head>
    <body onload="listar_examenes('');" class="page-body">

      
        <div class="page-container">


            <?php include 'sidebar.php' ; ?>


            <div class="main-content">

                <!-- User Info, Notifications and Menu Bar -->
                <?php include 'encabezado.php' ; ?>

       

                <div class="page-title">

                    <div class="title-env">
                        <h1 class="title">Examenes Ocupacionales</h1>
                        <p class="description"> Aqui encontraras la lista de los empleados , y sus Respectivos Examenes </p>
                    </div>

                    <div class="breadcrumb-env">

                        <ol class="breadcrumb bc-1">
                            <li>
                                <a href="index.php"><i class="fa-home"></i>Home</a>
                            </li>
                            <li>

                                <a href="#Empleados">Empleados</a>
                            </li>
                            <li class="active">

                                <strong>Examenes Ocupacionales</strong>
                            </li>
                        </ol>

                    </div>

                </div>

                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Carpetas Examenes</h3>

                        <div class="panel-options">
                            <a href="#" data-toggle="panel">
                                <span class="collapse-icon">&ndash;</span>
                                <span class="expand-icon">+</span>
                            </a>
                        </div>
                    </div>


                    <br>
                    <div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input  id="buscar" onkeyup="listar_examenes(this.value);" name="buscar" type="text" class="form-control no-right-border form-focus-blue" placeholder="Buscar Por..">

                                <span class="input-group-btn">
                                    <button  id="btn_buscar_valor" class="btn btn-blue" type="button"><i class="fa fa-search"></i>  Buscar </button>
                                </span>
                            </div></div>

                        <div class="btn-group">
                            <button  type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-wrench"></i> Herramientas <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-blue" role="menu">
                                <li>
                                    <a href="examenes_ocupacionales.php">Nueva Carpeta</a>
                                </li>
                                <li>
                                    <a href="#">Exportar Excel</a>
                                </li>

                            </ul>
                        </div>


                    </div>

                    <div class="panel-body">

                        <div id="cuantos"></div><br>
                        <div class="table-responsive">
                        <table  class="table table-striped table-bordered " id="example-3">
                            <thead style="background-color:#F8F8F8;" >
                                <tr>
                                    <td width="10%">Cedula Empleado</td>
                                    <td width="25%">Nombre Empleado</td>
                                    <td width="15%">Cargo</td>
                                    <td width="5%">Cantidad Examenes</td>
                                    <td width="5%">Folder</td>
                                </tr>
                            </thead>
                            <tbody id="listar_examenes">

                            </tbody>

                        </table>
                        </div>

                    </div>
                </div>




                

                <!-- Main Footer -->
                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                <!-- Or class "fixed" to  always fix the footer to the end of page -->

                <?php include 'footer.php' ; ?>

            </div>


            <!-- start: Chat Section -->
            <?php include 'chat.php' ; ?>
            <!-- end: Chat Section -->


        </div>


        <div class="page-loading-overlay">
            <div class="loader-2"></div>
        </div>




        <!-- Bottom Scripts -->
        <link rel="stylesheet" href="assets/js/datatables/dataTables.bootstrap.css">
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/xenon-api.js"></script>
        <script src="assets/js/xenon-toggles.js"></script>



        <script src="librerias/listar_examenes.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/xenon-custom.js"></script>

    </body>

    <?php include 'xdev.php' ; ?>

</html>