<?php

/*
 * @Author: Jonathan Diaz 
 */
include 'class_conexion.php' ;

class menus extends Conectar
{

    private $menu ;

    public function __construct ()
    {
        $this -> menu = array () ;
    }

    public function get_menus ($perfil,$idsimplex)
    {
        $sql = "SELECT menu_id,titulo,padre,icono,nombre_menu FROM menus
                INNER JOIN perfil_definicion 
                ON perfil_definicion.menu=menus.menu_id
                INNER JOIN perfiles 
                ON perfiles.perfil_id=perfil_definicion.perfil_id
                WHERE perfiles.perfil_id=$perfil
                AND menus.idsimplex=$idsimplex  
                AND padre=0 
                GROUP BY menu_id,titulo,padre,icono,nombre_menu
                ORDER BY  menu_id" ;

        $_SESSION[ "CONSULTA_MENUS" ]=$sql;
        $consulta = pg_query ( parent::con () , $sql ) ;
        while ( $reg = pg_fetch_assoc( $consulta ) )
        {
            $this -> menu[]=$reg;
        }
        return $this ->menu;
       
    }

    
     public function get_submenus ($perfil,$idsimplex)
    {
        $sql = "SELECT menu_id,titulo,padre,icono,nombre_menu,url FROM menus
                INNER JOIN perfil_definicion 
                ON perfil_definicion.menu=menus.menu_id
                INNER JOIN perfiles 
                ON perfiles.perfil_id=perfil_definicion.perfil_id
                WHERE perfiles.perfil_id=$perfil
                AND menus.idsimplex=$idsimplex  
                AND padre <> 0
                GROUP BY menu_id,titulo,padre,icono,nombre_menu,url
                ORDER BY  menu_id";

        $_SESSION[ "CONSULTA_MENUS" ]=$sql;
        $consulta = pg_query ( parent::con () , $sql ) ;
        while ( $reg = pg_fetch_assoc( $consulta ) )
        {
            $this -> menu[]=$reg;
        }
        return $this ->menu;
       
    }
}

?>