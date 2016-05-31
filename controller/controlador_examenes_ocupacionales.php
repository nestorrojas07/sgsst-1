<?php

/**
 *  @author : Jonathan Diaz Moreno;
 */
include '../model/class_examenes_ocupacionales.php' ;

session_start () ;

$boton = $_POST[ "boton" ] ;

if ( $boton == 'buscar_examen' )
{
    $valor = $_POST[ "valor" ] ;
    $examenes = new examenes_ocupacionales() ;
    $registros = $examenes -> get_examenes ( $valor ) ;
    echo json_encode ( $registros ) ;
}

if ( $boton == 'eliminar_examen' )
{
    $examen_id = $_POST[ "examen_id" ] ;
    $examenes = new examenes_ocupacionales() ;
    $reg = $examenes -> delete_examenes ( $examen_id ) ;
    echo 'exito';
    
    
}


if ( $boton == 'buscar_empleados' )
{
    $parametro = $_POST[ "parametro" ] ;

    $examenes = new examenes_ocupacionales() ;
    $registros = $examenes -> get_empleados ( $parametro ) ;
    echo json_encode ( $registros ) ;
}

if ( $boton == 'grabar_examen' )
{
    $titulo = $_POST[ "titulo" ] ;
    $observacion = $_POST[ "observacion" ] ;
    $adjunto = $_POST[ "adjunto" ] ;
    $empleado_id = $_POST[ "empleado_id" ] ;
    
    $examenes = new examenes_ocupacionales() ;
    $registros = $examenes -> guardar_examenes ($titulo,$observacion,$adjunto,$empleado_id) ;
    if($registros == 1 )
    {
        echo 'exito';
    }
    else
    {
        echo $registros;
    }
}

if ( $boton == 'actualizar_examen' )
{
    $titulo = $_POST[ "titulo" ] ;
    $observacion = $_POST[ "observacion" ] ;
    $adjunto = $_POST[ "adjunto" ] ;
    $examen_id = $_POST[ "id_examen" ] ;
    
    $examenes = new examenes_ocupacionales() ;
    $registros = $examenes -> actualizar_examenes ($titulo,$observacion,$adjunto,$examen_id) ;
    if ($registros == 1)
    {
        echo 'exito';
    }
    else
    {
        echo $registros;
    }
}

if ( $boton == 'listar_examen' )
{
    
    $empleado_id = $_POST[ "empleado_id" ] ;
    
    $examenes = new examenes_ocupacionales() ;
    $registros = $examenes -> listar_examenes ($empleado_id) ;
    echo json_encode($registros);
}

if ( isset ( $_FILES[ "examen" ] ) )
{
    $archivo          = $_FILES[ "examen" ] ;
    $nombre           = $archivo[ "name" ] ;
    $ruta_provisional = $archivo[ "tmp_name" ] ;
    $tipo             = $archivo[ "type" ] ;
    $size             = $archivo[ "size" ] ;
    $carpeta          = "../view/adjuntos/examenes/" ;
    $src              = $carpeta . $nombre ;
    move_uploaded_file ( $ruta_provisional , $src ) ;
    echo $src ;
}

?>

