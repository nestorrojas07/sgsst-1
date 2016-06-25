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
        <title>SGSST - empleados</title>
    </head>
    <body onload="listar_empleados('');" class="page-body">

        <!--	<div class="settings-pane">
                                
                        <a href="#" data-toggle="settings-pane" data-animate="true">
                                &times;
                        </a>
                        
                        <div class="settings-pane-inner">
                                
                                <div class="row">
                                        
                                        <div class="col-md-4">
                                                
                                                <div class="user-info">
                                                        
                                                        <div class="user-image">
                                                                <a href="extra-profile.html">
                                                                        <img src="assets/images/user-2.png" class="img-responsive img-circle" />
                                                                </a>
                                                        </div>
                                                        
                                                        <div class="user-details">
                                                                
                                                                <h3>
                                                                        <a href="extra-profile.html">John Smith</a>
                                                                        
                                                                         Available statuses: is-online, is-idle, is-busy and is-offline 
                                                                        <span class="user-status is-online"></span>
                                                                </h3>
                                                                
                                                                <p class="user-title">Web Developer</p>
                                                                
                                                                <div class="user-links">
                                                                        <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                                                                        <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
                                                                </div>
                                                                
                                                        </div>
                                                        
                                                </div>
                                                
                                        </div>
                                        
                                        <div class="col-md-8 link-blocks-env">
                                                
                                                <div class="links-block left-sep">
                                                        <h4>
                                                                <span>Notifications</span>
                                                        </h4>
                                                        
                                                        <ul class="list-unstyled">
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                                                        <label for="sp-chk1">Messages</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                                                        <label for="sp-chk2">Events</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                                                        <label for="sp-chk3">Updates</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                                                        <label for="sp-chk4">Server Uptime</label>
                                                                </li>
                                                        </ul>
                                                </div>
                                                
                                                <div class="links-block left-sep">
                                                        <h4>
                                                                <a href="#">
                                                                        <span>Help Desk</span>
                                                                </a>
                                                        </h4>
                                                        
                                                        <ul class="list-unstyled">
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Support Center
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Submit a Ticket
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Domains Protocol
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Terms of Service
                                                                        </a>
                                                                </li>
                                                        </ul>
                                                </div>
                                                
                                        </div>
                                        
                                </div>
                        
                        </div>
                        
                </div>-->

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
            <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
            <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->


            <?php include 'sidebar.php' ; ?>


            <div class="main-content">

                <!-- User Info, Notifications and Menu Bar -->
                <?php include 'encabezado.php' ; ?>


                     

                <div class="page-title">

                    <div class="title-env">
                        <h1 class="title">Empleados</h1>
                        <p class="description"> Aqui encontraras la lista de los empleados , se pueden buscar y filtrar</p>
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

                                <strong>lista Empleados</strong>
                            </li>
                        </ol>

                    </div>

                </div>

                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista Empleados</h3>

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
                                <input  id="buscar" onkeyup="listar_empleados(this.value);" name="buscar" type="text" class="form-control no-right-border form-focus-blue" placeholder="Buscar Por..">

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
                                    <a href="empleados.php">Crear Nuevo</a>
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
                        <table  class="table table-striped table-bordered  " id="example-3">
                            <thead style="background-color:#F8F8F8;" >
                                <tr>
                                    <th width="2%">#</th>
                                    <th width="10%">Cedula Empleado</th>
                                    <th width="25%">Nombre Empleado</th>
                                    <th width="10%">telefono</th>
                                    <th width="15%">Cargo</th>
                                    <th width="10%">Fecha Ingreso</th>
                                    <th width="5%">Folder</th>
                                </tr>
                            </thead>
                            <tbody id="listar_empleados">

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



        <script src="librerias/listar_empleados.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/xenon-custom.js"></script>

    </body>

    <?php include 'xdev.php' ; ?>

</html>