<?php
session_start () ;

if ( ! $_SESSION )
{
    ?>
    <script language = javascript>
        location.href = 'login.php' ;
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    </head>
    <body class="page-body">



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
                        <p class="description">Podras Crear Nuevos empleados o Modificarlos</p>
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

                                <a href="browser_empleados.php">Browser Empleados</a>
                            </li>
                            <li class="active">

                                <strong>Gestion Empleado</strong>
                            </li>
                        </ol>

                    </div>

                </div>


                <div class="form-group" align="right">

                    <button   id="nuevo_empleado" onclick="location.href = 'empleados.php' ;" style="border-radius: 7%;" class="btn btn-white btn-icon">
                        <i class="fa-file"></i>
                        <span>  Nuevo </span>
                    </button>

                    <button id="actualizar_empleado" onclick="actualizar_empleado () ;" style="border-radius: 7%;" class="btn btn-blue btn-icon">
                        <i class="fa-bolt"></i>
                        <span> Actualizar </span>
                    </button>
                    <button id="grabar_empleado" onclick="grabar_empleado () ;" style="border-radius: 7%;" class="btn btn-blue btn-icon">
                        <i class="fa-check"></i>
                        <span>Grabar</span>
                    </button>

                    <button onclick="location.href = 'browser_empleados.php' ;" style="border-radius: 7%;" class="btn btn-black btn-icon">
                        <i class="fa-database"></i>
                    </button>
                </div>
                <div class="row">


                    <div id="alertas" class="col-md-12"></div>

                    <hr>

                    <div class="col-md-12">

                        <ul class="nav nav-tabs nav-tabs-justified">
                            <li id="li-basica" class="active">
                                <a href="#basica" data-toggle="tab">
                                    <span class="visible-xs"><i class="fa fa-archive"></i></span>
                                    <span class="hidden-xs"><b><i class="fa fa-archive"></i> Informacion Basica</b></span>
                                </a>
                            </li>
                            <li id="li-hv">
                                <a href="#hv" data-toggle="tab">
                                    <span class="visible-xs"><i class="fa fa-sticky-note"></i></span>
                                    <span class="hidden-xs"><b><i class="fa fa-sticky-note"></i> Hoja de Vida</b></span>
                                </a>
                            </li>
                            <li id="li-contrato">
                                <a href="#contrato" data-toggle="tab">
                                    <span class="visible-xs"><i class="fa fa-file-text"></i></span>
                                    <span  class="hidden-xs"><b><i class="fa fa-file-text"></i> Contrato </b></span>
                                </a>
                            </li>
                        </ul>



                        <div class="tab-content">
                            <div class="tab-pane active" id="basica">
                                <div align="center" id="validacion" class="col-md-12"></div>

                                <div class="row">

                                    <div class="col-md-12">


                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Informacion Basica</h3>
                                                <div class="panel-options">
                                                    <a href="#" data-toggle="panel">
                                                        <span class="collapse-icon">&ndash;</span>
                                                        <span class="expand-icon">+</span>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="panel-body">


                                                <form role="form" class="form-horizontal">


                                                    <div class="form-group">


                                                        <label class="col-sm-2 control-label" for="tipo_documento">Tipo Documento<span class="request text-blue"> * </span></label>


                                                        <div class="col-sm-4">
                                                            <select class="form-control"  id="tipo_documento" name="tipo_documento">
                                                                <option></option>
                                                                <option value="Cedula Ciudadania">Cedula Ciudadania</option>
                                                                <option value="Pasaporte">Pasaporte</option>
                                                                <option value="Nit">Nit</option>
                                                                <option value="Licencia Conducir">Licencia Conducir</option>
                                                                <option value="Contraseña">Contraseña</option>


                                                            </select>
                                                        </div>
                                                        

                                                        <label class="col-sm-2 control-label" for="identificacion">Identificacion<span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input  onKeyPress="javascript:return solonumeros ( event )" type="text" maxlength="10" class="form-control " id="identificacion" placeholder="Identificacion">
                                                            <input type="hidden" name="id_get" id="id_get" value="<?php echo $_GET[ "id" ] ; ?>">
                                                            <input type="hidden" name="id_empleado" id="id_empleado">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label" for="nombre">Nombre <span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo ">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label" for="telefono">Telefono <span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input onKeyPress="javascript:return solonumeros ( event )" type="text" class="form-control " id="telefono" name="telefono" placeholder="Telefono">
                                                        </div>
                                                        <label class="col-sm-2 control-label" for="email">Email Personal<span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label" for="direccion">Direccion<span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder=" Ejemplo: Cra 1 # 2 - 40 Barrio Ejemplo ">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label" for="nacimiento">Fecha Nacimiento <span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group ">

                                                                <input type="text" id="nacimiento" data-format="dd/mm/yyyy" class="form-control datepicker" data-start-view="2" placeholder="DD/MM/AAAA">

                                                                <div class="input-group-addon">
                                                                    <a href="#"><i class="linecons-calendar"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label class="col-sm-2 control-label" for="estado_civil">Estado Civil<span class="request text-blue"> * </span></label>


                                                        <div class="col-sm-4">	
                                                            <select class="form-control" id="estado_civil" name="estado_civil">
                                                                <option></option>
                                                                <option value="Casado">Casado</option>
                                                                <option value="Soltero">Soltero</option>
                                                                <option value="Union Libre">Union Libre</option>
                                                            </select>
                                                        </div>	
                                                    </div>

                                                    <hr>
                                                    <div class="row"> 
                                                        <blockquote >   <p><small> En caso de Emergencia LLamar a :  </small></p> </blockquote> 
                                                    </div>
                                                    <br/>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label" for="emergencia1">Contacto Emerg 1 <span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input  type="text" class="form-control " id="emergencia1" name="emergencia1" placeholder="Nombre Contacto">
                                                        </div>
                                                        <label class="col-sm-2 control-label" for="tel_emergencia1">Telefono Emerg 1<span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input onKeyPress="javascript:return solonumeros ( event )"  type="text" class="form-control" id="tel_emergencia1" name="tel_emergencia1" placeholder="Telefono">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label" for="emergencia2">Contacto Emerg 2 <span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control " id="emergencia2" name="emergencia2" placeholder="Nombre Contacto">
                                                        </div>
                                                        <label class="col-sm-2 control-label" for="tel_emergencia2">Telefono Emerg 2<span class="request text-blue"> * </span></label>

                                                        <div class="col-sm-4">
                                                            <input onKeyPress="javascript:return solonumeros ( event )" type="text" class="form-control" id="tel_emergencia2" name="emergencia2" placeholder="Telefono">
                                                        </div>

                                                    </div>


                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>




                            </div>

                            <div  class="tab-pane" id="hv">
                                <form id="form_subir_hv" enctype="multipart/form-data">
                                    <div class="row">
                                        <div style="margin-bottom: 10px;" align="center" id="validacion_hv" class="col-md-12 "> </div>
                                        
                                        <div  id="div_hv" class="form-group">
                                           
                                            <label class="col-sm-3 control-label" for="hv">Adjuntar Hoja de vida : <span class="request text-blue"> * </span></label>

                                            <div class="col-sm-4">
                                                <input type="file" name="hv" class="form-control" id="hv" >
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="hidden" name="img_src" id="img_src">

                                                <button   type="submit" id="subir_hv" name="subir_hv" style="border-radius: 7%;" class="btn btn-blue">
                                                    <i class="fa fa-upload"></i>
                                                </button>

                                                <button  type="submit" id="update_hv" name="update_hv" style="border-radius: 7%;" class="btn btn-blue">
                                                    <i class="fa fa-refresh"></i>
                                                </button>

                                            </div>

                                        </div> 

                                        <div class="col-md-12">
                                            <div  id="evento_subida"></div>
                                            <hr>
                                            <div class="panel panel-color panel-gray panel-border panel-shadow"><!-- Add class "collapsed" to minimize the panel -->
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Hoja De Vida</h3>

                                                    <div class="panel-options">


                                                        <a href="#" data-toggle="panel">
                                                            <span class="collapse-icon">&ndash;</span>
                                                            <span class="expand-icon">+</span>
                                                        </a>


                                                    </div>
                                                </div>

                                                <div id="mostrar_hv" class="panel-body">



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>



                            </div>

                            <div class="tab-pane" id="contrato">

                                <div class="panel-body">


                                    <form  role="form" class="form-horizontal">
                                        <div class="form-group" align="right">
                                            <button type="submit" style="display: none;" name="actualizar_contrato" id="actualizar_contrato" style="border-radius: 7%;" class="btn btn-blue btn-icon">
                                                <i class="fa-bolt"></i>
                                                <span>Actualizar</span>
                                            </button>
                                            <button id="guardar_contrato" style="border-radius: 7%;" class="btn btn-blue btn-icon">
                                                <i class="fa-save"></i>
                                                <span>Guardar</span>
                                            </button>
                                        </div>
                                        <div id="validacion_contrato"></div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="cod_contrato">Codigo Contrato<span class="request text-blue"> * </span></label>

                                            <div class="col-sm-4">
                                                <input type="hidden" id="contrato_adj" name="contrato_adj" >
                                                <input type="hidden" id="empleado_id" name="empleado_id" value="<?php echo $_GET[ "id" ] ; ?>" >
                                                <input type="text" class="form-control " name="cod_contrato" id="cod_contrato" placeholder="Codigo Contrato">
                                                <input type="hidden"  name="contrato_cod" id="contrato_cod" >
                                            </div>

                                            <label class="col-sm-2 control-label" for="fecha_ingreso">Fecha Ingreso<span class="request text-blue"> * </span></label>
                                            <div class="col-sm-4">
                                                <div class="input-group ">

                                                    <input type="text" data-format="dd/mm/yyyy" id="fecha_ingreso" class="form-control datepicker" data-start-view="2" placeholder="DD/MM/AAAA">

                                                    <div class="input-group-addon">
                                                        <a href="#"><i class="linecons-calendar"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="cargo">Cargo <span class="request text-blue"> * </span></label>


                                            <div class="col-sm-4">	
                                                <select class="form-control" id="cargo" name="cargo">
                                                    <option></option>

                                                </select>
                                            </div>

                                            <label class="col-sm-2 control-label" for="salario">Salario<span class="request text-blue"> * </span></label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm input-group-minimal ">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </span>
                                                    <input id="salario" type="text" class="form-control" data-mask="fdecimal" placeholder=" Salario" data-dec="," data-rad="." maxlength="10" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="tp_contrato">Tipo Contrato <span class="request text-blue"> * </span></label>


                                            <div class="col-sm-4">	
                                                <select class="form-control" id="tp_contrato" name="tp_contrato">
                                                    <option></option>
                                                    <option value="1">Indefinido</option>
                                                    <option value="2">Definido</option>
                                                    <option value="3">Aprendizaje</option>
                                                </select>
                                            </div>

                                        </div>
                                    </form>
                                    <hr>
                                    <br>
                                    <form id="form_subir_contrato" enctype="multipart/form-data" > 
                                        <div class="form-group">

                                            <label class="col-sm-3 control-label" for="contrato">Adjuntar Contrato <span class="request text-blue"> * </span></label>

                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="file_contrato" name="file_contrato" >
                                            </div>


                                        </div>  
                                        <div class="form-group">



                                            <div class="col-md-12">

                                                <hr>
                                                <div class="panel panel-color panel-gray panel-border panel-shadow"><!-- Add class "collapsed" to minimize the panel -->
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Contrato</h3>

                                                        <div class="panel-options">


                                                            <a href="#" data-toggle="panel">
                                                                <span class="collapse-icon">&ndash;</span>
                                                                <span class="expand-icon">+</span>
                                                            </a>


                                                        </div>
                                                    </div>

                                                    <div id="mostrar_contrato" class="panel-body">



                                                    </div>
                                                </div>
                                            </div>


                                        </div>  
                                    </form>

                                </div>

                            </div>
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



        <div style="margin-top: 220px;" class="modal fade" id="cargando">
            <div class="modal-dialog" style="width:1%; " >
                <img src="assets/loader.gif"/>
            </div>
        </div>

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
            $(document).on("ready",function()
            {

                $('#li-hv').hide();
                $('#actualizar_empleado').hide();
                $('#li-contrato').hide();
                $('#nuevo_empleado').hide();
                $('#update_hv').hide();

                $.ajax({
                url:'../controller/controlador_empleados.php',
                type:'POST',
                data:'boton=listar_cargos'

                }).done(function(resp)
                {

                    var reg=eval(resp);

                    $.each(reg,function(i,item)
                    {
                    $("#cargo").append("<option value='"+reg[i].cargo_id+"'>"+reg[i].cargo_des+"</option>");

                    });

                });


            });
        </script>
        <script src="librerias/gestion_empleados.js" ></script>

    </body>

    <?php include 'xdev.php' ; ?>

</html>