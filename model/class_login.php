<?php

/*
 * @Author: Jonathan Diaz
 */

include_once 'class_conexion.php' ;

class logeo extends Conectar
{

    private $login ;

    public function __construct ()
    {
        $this -> login = array () ;
    }

    public function logearse ( $usuario , $password )
    {

//        $pass =  sha1($password);

        $sql       = "SELECT * FROM usuarios
             WHERE usuario='$usuario'
             AND pass='$password' " ;
        $consulta  = pg_query ( parent::con () , $sql ) ;
        $resultado = pg_num_rows ( $consulta ) ;
//        $resultado=  mysql_num_rows($consulta);
        if ( $resultado > 0 )
        {
            $reg_login     = pg_fetch_assoc ( $consulta ) ;
            $this -> login[] = $reg_login ;
        }
        else
        {
            $this -> login[ 0 ] = 0 ;
        }
        return $this -> login ;
    }

}

?>