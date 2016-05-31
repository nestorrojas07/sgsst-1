<?php

/**
 *  @author : Jonathan Diaz Moreno;
 */
include '../model/class_empleados.php' ;

session_start () ;

$boton = $_POST[ "boton" ] ;

if ( $boton == 'buscar_empleado' )
{
    $valor     = $_POST[ "valor" ] ;
    $empleados = new empleados() ;
    $registros = $empleados -> get_empleados ( $valor ) ;
    echo json_encode ( $registros ) ;
}

if ( $boton == 'listar_id' )
{
    $identificacion = $_POST[ "id_get" ] ;
    $empleado_id    = new empleados() ;
    $reg            = $empleado_id -> get_empleados_id ( $identificacion ) ;
    echo json_encode ( $reg ) ;
}

if ( $boton == 'listar_cargos' )
{
    $cargos = new empleados() ;
    $reg    = $cargos -> get_cargos () ;
    echo json_encode ( $reg ) ;
}

if ( $boton == 'grabar_empleado' )
{
    $tp_documento    = $_POST[ "tp_documento" ] ;
    $identificacion  = $_POST[ "identificacion" ] ;
    $nombre          = $_POST[ "nombre" ] ;
    $telefono        = $_POST[ "telefono" ] ;
    $email           = $_POST[ "email" ] ;
    $direccion       = $_POST[ "direccion" ] ;
    $nacimiento      = $_POST[ "nacimiento" ] ;
    $estado_civil    = $_POST[ "estado_civil" ] ;
    $emergencia1     = $_POST[ "emergencia1" ] ;
    $emergencia2     = $_POST[ "emergencia2" ] ;
    $tel_emergencia1 = $_POST[ "tel_emergencia1" ] ;
    $tel_emergencia2 = $_POST[ "tel_emergencia2" ] ;
    $idsimplex       = $_SESSION[ "idsimplex" ] ;
    $idlicencia      = $_SESSION[ "idlicencia" ] ;
    $usuela          = $_SESSION[ "usuela" ] ;

    $insert_empleados = new empleados() ;
    $reg              = $insert_empleados -> insert_empleados ( $tp_documento , $identificacion , $nombre , $telefono , $email , $direccion , $nacimiento , $estado_civil , $emergencia1 , $emergencia2 , $idsimplex , $idlicencia , $usuela , $tel_emergencia1 , $tel_emergencia2 ) ;

    print_r ( $reg ) ;
}

if ( $boton == 'actualizar_empleado' )
{
    $tp_documento   = $_POST[ "tp_documento" ] ;
    $identificacion = $_POST[ "identificacion" ] ;
    $nombre         = $_POST[ "nombre" ] ;
    $telefono       = $_POST[ "telefono" ] ;
    $email          = $_POST[ "email" ] ;
    $direccion      = $_POST[ "direccion" ] ;
    $nacimiento     = $_POST[ "nacimiento" ] ;
    $estado_civil   = $_POST[ "estado_civil" ] ;
    $emergencia1    = $_POST[ "emergencia1" ] ;
    $emergencia2    = $_POST[ "emergencia2" ] ;
    $idsimplex      = $_SESSION[ "idsimplex" ] ;
    $idlicencia     = $_SESSION[ "idlicencia" ] ;
    $usuela         = $_SESSION[ "usuela" ] ;

    $update_empleados = new empleados() ;
    $reg              = $update_empleados -> actualizar_empleados ( $tp_documento , $identificacion , $nombre , $telefono , $email , $direccion , $nacimiento , $estado_civil , $emergencia1 , $emergencia2 , $idsimplex , $idlicencia , $usuela ) ;

    print_r ( $reg ) ;
}


if ( isset ( $_FILES[ "hv" ] ) )
{
    $archivo          = $_FILES[ "hv" ] ;
    $nombre           = $archivo[ "name" ] ;
    $ruta_provisional = $archivo[ "tmp_name" ] ;
    $tipo             = $archivo[ "type" ] ;
    $size             = $archivo[ "size" ] ;
    $carpeta          = "../view/adjuntos/hv/" ;
    $src              = $carpeta . $nombre ;
    move_uploaded_file ( $ruta_provisional , $src ) ;
    echo $src ;
}



if ( $boton == 'guardar_contrato' )
{
    $id_empleado      = $_POST[ "id_empleado" ] ;
    $cod_contrato     = $_POST[ "cod" ] ;
    $fecha_ingreso    = $_POST[ "fecha_ingreso" ] ;
    $salario          = $_POST[ "salario" ] ;
    $tp_contrato      = $_POST[ "tp_contrato" ] ;
    $contrato_adjunto = $_POST[ "contrato_adjunto" ] ;
    $cargo            = $_POST[ "cargo" ] ;
    $idsimplex        = $_SESSION[ "idsimplex" ] ;
    $idlicencia       = $_SESSION[ "idlicencia" ] ;
    $usuela           = $_SESSION[ "usuela" ] ;

    $contrato = new empleados() ;
    $reg      = $contrato -> grabar_contrato ( $id_empleado , $cod_contrato , $fecha_ingreso , $salario , $tp_contrato , $contrato_adjunto , $cargo , $idsimplex , $idlicencia , $usuela ) ;

    if ( $reg == TRUE )
    {
        echo 'exito' ;
    }
}


if ( $boton == 'actualizar_contrato' )
{
    $id_empleado      = $_POST[ "id_empleado" ] ;
    $cod_contrato     = $_POST[ "cod" ] ;
    $fecha_ingreso    = $_POST[ "fecha_ingreso" ] ;
    $salario          = $_POST[ "salario" ] ;
    $tp_contrato      = $_POST[ "tp_contrato" ] ;
    $contrato_adjunto = $_POST[ "contrato_adjunto" ] ;
    $cargo            = $_POST[ "cargo" ] ;
    $idsimplex        = $_SESSION[ "idsimplex" ] ;
    $idlicencia       = $_SESSION[ "idlicencia" ] ;
    $usuela           = $_SESSION[ "usuela" ] ;

    $update_contrato = new empleados() ;
    $reg             = $update_contrato -> actualizar_contratos ( $cod_contrato , $id_empleado , $salario , $fecha_ingreso , $cargo , $contrato_adjunto , $idsimplex , $idlicencia , $usuela , $tp_contrato ) ;

    if ( $reg == TRUE )
    {
        echo 'exito' ;
    }
}




if ( $boton == 'guardar_hv' )
{
    $img         = $_POST[ "img" ] ;
    $id_empleado = $_POST[ "id_empleado" ] ;
    $idsimplex   = $_SESSION[ "idsimplex" ] ;
    $idlicencia  = $_SESSION[ "idlicencia" ] ;
    $usuela      = $_SESSION[ "usuela" ] ;
    $hv          = new empleados() ;
    $reg         = $hv -> grabar_hv ( $id_empleado , trim ( $img ) , $idsimplex , $idlicencia , $usuela ) ;

    if ( $reg == TRUE )
    {
        echo 'exito' ;
    }
}

if ( $boton == 'update_hv' )
{
    $img         = $_POST[ "img" ] ;
    $id_empleado = $_POST[ "id_empleado" ] ;
    $usuela      = $_SESSION[ "usuela" ] ;
    $hv          = new empleados() ;
    $reg         = $hv -> update_hv ( $id_empleado , trim ( $img ) , $usuela ) ;

    if ( $reg == '1' )
    {
        echo 'exito' ;
    }
    elseif ( $reg == '2' )
    {
        echo 'error' ;
    }
}
?>

