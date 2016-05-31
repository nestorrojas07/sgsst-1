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
        <title>SGSST - Empleados</title>
        <!--<link rel="stylesheet" href="assets/js/select2/select2.css">-->
        <!--<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">-->
<!--        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>-->
    </head>
    <body  class="page-body">



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
                        <h1 class="title">Examenes</h1>
                        <p class="description">Podras Crear Nueva Carpeta de examenes Ocupacionales</p>
                    </div>

                    <div class="breadcrumb-env">

                        <ol class="breadcrumb bc-1">
                            <li>
                                <a href="index.php"><i class="fa-home"></i>Home</a>
                            </li>
                            <li>

                                <a href="#Empleados">Empleados</a>
                            </li>
                            <li>

                                <a href="browser_examenes_ocupacionales.php">Browser Examenes </a>
                            </li>
                            <li class="active">

                                <strong>Examenes Ocupacionales</strong>
                            </li>
                        </ol>

                    </div>

                </div>


                <div class="form-group" align="right">

                    <button   id="nuevo_empleado" onclick="location.href = 'examenes_ocupacionales.php';" style="border-radius: 7%;" class="btn btn-white btn-icon">
                        <i class="fa-file"></i>
                        <span>  Nuevo </span>
                    </button>

                    <button id="agregar_examen" onclick="agregar_examen();" style="border-radius: 7%;" class="btn btn-blue btn-icon">
                        <i class="fa fa-plus"></i>
                    </button>

                    <button onclick="location.href = 'browser_examenes_ocupacionales.php';" style="border-radius: 7%;" class="btn btn-black btn-icon">
                        <i class="fa-database"></i>
                    </button>
                </div>
                <div class="row">
                    <div id="alertas" class="col-md-12"></div>

                    <div id="panel_buscar" class="panel panel-default panel-border">
                        <div class="panel-heading">
                            <i class="fa fa-search"></i> Buscar Empleado
                        </div>

                        <div class="panel-body" >
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input  id="buscar"  name="buscar" type="text" class="form-control no-right-border form-focus-blue" placeholder="Buscar Por Cedula o Nombre ">

                                    <span class="input-group-btn">
                                        <button onclick="buscar_empleado();" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" id="btn_buscar_valor" class="btn btn-blue" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>

                </div>

                <div hidden="true" id="encabezado" class="row">
                    <div class="panel panel-default panel-border">
                        <div class="panel-heading">
                            <div  class="col-md-3" align="center"><h4><i class="fa fa-slack">  </i> <b id="identificacion">   </b></h4></div>
                            <div  class="col-md-6" align="center"><h4><i class="fa fa-user"> </i> <b id="user">  </b> </h4></div>
                            <div  class="col-md-3" align="center"><h4><i class="fa fa-file-text"> </i> <b id="cuantos_doc">  </b> </h4></div>
                            <input type="hidden" class="form-control" name="empleado_id" id="empleado_id" value="<?php if(isset($_GET["id"])){ echo $_GET["id"]; } ?>" >
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div  class="col-md-12">

                        <div class="panel-group" id="listar_examenes">

                           
                        </div>
                        

                    </div>

                </div>




                <!--******************** FIN CONTENIDO DE LA PAGINA *****************************************--->        

                <?php include 'footer.php' ; ?>

            </div>


            <!-- start: Chat Section -->
            <?php include 'chat.php' ; ?>
            <!-- end: Chat Section -->


        </div>

        <!---**************************** MODALES ********************************************-->

        <div class="modal fade custom-width" id="buscar_empleado">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-search"></i> Busqueda Empleado </h4>
                    </div>

                    <div id="mostrar_empleados"  class="modal-body">

                        <table  align="center" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
                            <thead>
                                <tr align="center" style="background-color:#E0E0E0; " rol="row" class="heading">
                                    <td width="20%"><b>Cedula<b/></td>
                                    <td width="40%"><b>Nombre<b/></td>
                                    <td width="30%"><b>Cargo<b/></td>
                                    <td width="5%"><b>Accion<b/></td>
                                </tr>
                            </thead>
                            <tbody id="lista_empleados">

                            </tbody>
                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade custom-width" id="modal_agregar_examenes">
            <div class="modal-dialog" style="width: 80%;">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-clipboard"></i> Agregar Examen </h4>

                    </div>

                    <div  id="mostrar_empleados"  class="modal-body">
                        <center>
                            <form role="form" class="form-horizontal" id="form_subir_examen" enctype="multipart/form-data">
                                <div class="form-group">

                                    <label class="col-sm-2 control-label" for="titulo">Titulo / Nombre : <span class="request text-blue"> * </span></label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label class="col-sm-2 control-label" for="observacion">Observacion  : <span class="request text-blue"> * </span></label>

                                    <div class="col-sm-10">
                                        <textarea rows="4" class="form-control" name="observacion" id="observacion"> </textarea>
                                    </div>

                                </div>
                                <div  id="div_hv" class="form-group">

                                    <label class="col-sm-2 control-label" for="examen">Adjuntar Examen : <span class="request text-blue"> * </span></label>

                                    <div class="col-sm-4">
                                        <input type="file" name="examen" class="form-control" id="examen" >
                                        <input type="hidden" name="img_src" id="img_src">
                                        <input type="hidden" name="id_examen" id="id_examen">
                                    </div>
                                </div>
                                <div id="mostrar_examen" class="col-sm-12">      
                                </div>
                            </form>
                        </center>

                        <br>
                        <div class="clearfix"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        <button type="button" onclick="grabar_examen();" id="guardar_examen" name="guardar_examen" class="btn btn-blue" >Agregar</button>
                        <button type="button" onclick="actualizar_examen();" id="actualizar_examen" name="actualizar_examen" class="btn btn-blue" > Modificar </button>

                    </div>
                </div>
            </div>
        </div>


        <div style="margin-top: 220px;" class="modal fade" id="cargando">
            <div class="modal-dialog" style="width:1%; " >
                <img src="assets/loader.gif"/>
            </div>
        </div>

        <!---**************************FIN MODALES ********************************************-->

        <!-- Bottom Scripts -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/xenon-api.js"></script>
        <script src="assets/js/xenon-toggles.js"></script>
        <script src="assets/js/inputmask/jquery.inputmask.bundle.js"></script>
        <script src="assets/js/datepicker/bootstrap-datepicker.js"></script>
        <!--<script src="assets/js/select2/select2.min.js"></script>-->
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/xenon-custom.js"></script>
        <script>
                            $(document).on("ready", function ()
                            {
                                var id_get = (<?php echo $_GET["id"]; ?>);
                                var nombre_empleado = ('<?php echo $_GET["n"]; ?>');
                                
                                
                                
                                if (id_get !== 0)
                                {
                                    $('#panel_buscar').hide();
                                    $('#encabezado').show();
                                    $('#identificacion').html(id_get);
                                    $('#user').html(nombre_empleado);
                                    listar_examen();
                                }
                                else
                                {
                                    
                                }

                            });
        </script>
        <script src="librerias/examenes_ocupacionales.js" ></script>

    </body>

    <?php include 'xdev.php' ; ?>

</html>