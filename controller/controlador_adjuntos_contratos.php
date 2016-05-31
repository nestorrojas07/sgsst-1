<?php

/**
 *  @author : Jonathan Diaz Moreno;
 */
include '../model/class_empleados.php' ;

session_start () ;




if ( isset ( $_FILES[ "file_contrato" ] ) )
{
    $archivo = $_FILES[ "file_contrato" ] ;
    $nombre = $archivo[ "name" ];
    $ruta_provisional = $archivo[ "tmp_name" ] ;
    $tipo             = $archivo[ "type" ] ;
    $size             = $archivo[ "size" ] ;
    $carpeta          = "../view/adjuntos/contratos/" ;
    $src              = $carpeta . $nombre ;
    move_uploaded_file ( $ruta_provisional , $src ) ;
    echo $src;
   
}
elseif (!isset ( $_FILES[ "file_contrato" ] ))
{
    echo 'no entro';
}



?>

