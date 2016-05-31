<?php

/**
 *  @author: Jonathan Diaz
 */
include 'class_conexion.php' ;
session_start () ;

class examenes_ocupacionales extends Conectar
{

    private $examenes ;

    public function __construct ()
    {
        $this -> examenes = array () ;
    }

    public function get_examenes ( $valor )
    {
        $sql                             = "SELECT count(*) AS cuantos,examenes_ocupacionales.empleado_id,empleados.nombre_empleado,cargos.cargo_des
                FROM examenes_ocupacionales
                INNER JOIN empleados ON empleados.identificacion=examenes_ocupacionales.empleado_id
                LEFT JOIN contratos ON contratos.empleado_id=empleados.identificacion
                LEFT JOIN cargos ON cargos.cargo_id=contratos.cargo_id
                WHERE upper (empleados.identificacion::character varying) LIKE upper('%" . $valor . "%')
                OR upper (empleados.nombre_empleado) LIKE upper('%" . $valor . "%')
                OR upper (cargos.cargo_des) LIKE upper('%" . $valor . "%')
                GROUP BY examenes_ocupacionales.empleado_id,identificacion,cargos.cargo_id" ;
        $_SESSION[ "CONSULTA_EXAMENES" ] = $sql ;
        $consulta                        = pg_query ( parent::con () , $sql ) ;
        while ( $reg                             = pg_fetch_assoc ( $consulta ) )
        {
            $this -> empleados[] = $reg ;
        }
        return $this -> empleados ;
    }

    public function get_empleados ( $parametro )
    {
        $sql = "SELECT identificacion,nombre_empleado,cargo_des
                FROM vw_empleados
                WHERE upper (identificacion::character varying) LIKE upper('%" . $parametro . "%')
                OR upper (nombre_empleado) LIKE upper('%" . $parametro . "%')
                OR upper (cargo_des) LIKE upper('%" . $parametro . "%')
                ORDER BY fecela DESC" ;

        $_SESSION[ "CONSULTA_EMPLEADOS" ] = $sql ;
        $consulta                         = pg_query ( parent::con () , $sql ) ;
        while ( $reg                              = pg_fetch_assoc ( $consulta ) )
        {
            $this -> examenes[] = $reg ;
        }
        return $this -> examenes ;
    }

    public function listar_examenes ( $empleado_id )
    {
        $sql = "SELECT *
                FROM examenes_ocupacionales
                WHERE empleado_id=$empleado_id ORDER BY fecela DESC" ;

        $_SESSION[ "CONSULTA_EXAMENES" ] = $sql ;
        $consulta                        = pg_query ( parent::con () , $sql ) ;
        while ( $reg                             = pg_fetch_assoc ( $consulta ) )
        {
            $this -> examenes[] = $reg ;
        }
        return $this -> examenes ;
    }

    public function delete_examenes ( $examen_id )
    {
        $sql                             = "DELETE  FROM examenes_ocupacionales
              WHERE examen_id=$examen_id " ;
        $_SESSION[ "ELIMINAR_EXAMENES" ] = $sql ;
        $consulta                        = pg_query ( parent::con () , $sql ) ;
        $respuesta                       = pg_affected_rows ( $consulta ) ;
        $_SESSION[ "RESPUESTA" ]           = $respuesta ;
    }

    public function guardar_examenes ( $titulo , $observacion , $adjunto , $empleado_id )
    {

        $sql                            = "INSERT INTO examenes_ocupacionales (titulo,observacion,anexo,empleado_id,usuela,fecela,idsimplex,idlicencia)
              VALUES 
              ('$titulo','$observacion','" . trim ( $adjunto ) . "',$empleado_id," . $_SESSION[ "usuela" ] . ",now()," . $_SESSION[ "idsimplex" ] . "," . $_SESSION[ "idlicencia" ] . ") " ;
        $consulta                       = pg_query ( parent::con () , $sql ) ;
        $_SESSION[ "GUARDAR_EXAMENES" ] = $sql ;

        if ( $consulta == TRUE )
        {
            return 1 ;
        }
        else
        {
            return 0 ;
        }
    }

    public function actualizar_examenes ( $titulo , $observacion , $adjunto , $examen_id )
    {
        $sql_actualizar                    = "UPDATE examenes_ocupacionales SET titulo='" . $titulo . "',observacion='" . $observacion . "',anexo='" . $adjunto . "'  WHERE examen_id=$examen_id " ;
        $_SESSION[ "ACTUALIZAR_EXAMENES" ] = $sql_actualizar ;
        $consulta                          = pg_query ( parent::con () , $sql_actualizar ) ;


        if ( $consulta == TRUE )
        {
            return 1 ;
        }
        else
        {
            return $sql_actualizar ;
        }
    }

}

?>