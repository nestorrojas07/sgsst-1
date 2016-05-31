<?php

/**
 * @author: Jonathan Diaz 
 */
require_once '../model/class_login.php' ;
$boton    = $_POST[ "boton" ] ;
$usuario  = $_POST[ "username" ] ;
$password = $_POST[ "passwd" ] ;


//echo $usuario.'-'.$password;

if ( $boton == 'cerrar' )
{
    session_start () ;
    session_destroy () ;
  
}
else
{

    $lg  = new logeo() ;
    $reg = $lg -> logearse ( $usuario , $password ) ;
//echo 'usuario :'.$usuario.'  CONTRASEÑA: '.$password.'';
    // print_r($reg);
    $resp = array('accessGranted' => false, 'errors' => ''); // For ajax response
   if (  $reg[0] != 0 )
    {
       
        session_start ();
        $_SESSION[ "ingreso" ]        = 'Y' ;
        $_SESSION[ 'nombre_usuario' ] = $reg[ 0 ][ 'nombre_usuario' ] ;
        $_SESSION[ 'perfil' ]         = $reg[ 0 ][ 'perfil' ] ;
        $_SESSION[ 'usuela' ]         = $reg[ 0 ][ 'usuario_id' ] ;
        $_SESSION[ 'idsimplex' ]      = $reg[ 0 ][ 'idsimplex' ] ;
        $_SESSION[ 'idlicencia' ] =1;
        
        // todo para poder logearse con el efecto de la barra de progreso
      
        $resp['accessGranted'] = true;
	setcookie('failed-attempts', 0);
         echo json_encode($resp);
    }
    else
    {
        
        $fa = isset($_COOKIE['failed-attempts']) ? $_COOKIE['failed-attempts'] : 0;
			$fa++;
			
			setcookie('failed-attempts', $fa);
			
			// Error message
	$resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid username and password (demo/demo).<br />Failed attempts: ' . $fa;
         echo json_encode($resp);
    }
   
    
}
?>
