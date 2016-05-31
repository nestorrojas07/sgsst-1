<?php

/**
 * @author: Jonathan Diaz 
 */
require_once '../model/class_menus.php' ;
$boton     = $_POST[ "boton" ] ;
 $perfil_usuario = $_SESSION[ "perfil" ] ;
 $idsimplex = $_SESSION[ "idsimplex" ] ;
 

    $menus     = new menus() ;
    $registros = $menus -> get_menus ( $perfil_usuario , $idsimplex ) ;
    
    
    $submenus     = new menus() ;
    $reg = $submenus -> get_submenus ( $perfil_usuario , $idsimplex ) ;
    

?>