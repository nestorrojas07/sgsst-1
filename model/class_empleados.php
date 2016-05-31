<?php

/**
 *  @author: Jonathan Diaz
 */
include 'class_conexion.php' ;
session_start () ;

class empleados extends Conectar
{

    private $empleados ;

    public function __construct ()
    {
        $this -> empleados=array () ;
    }

    public function get_empleados ( $valor )
    {
        $sql="SELECT identificacion,nombre_empleado,telefono,cargo_des,fecha_ingreso
                FROM vw_empleados
                WHERE upper (identificacion::character varying) LIKE upper('%" . $valor . "%')
                OR upper (nombre_empleado) LIKE upper('%" . $valor . "%')
                OR upper (telefono) LIKE upper('%" . $valor . "%')
                OR upper (cargo_des) LIKE upper('%" . $valor . "%')
                ORDER BY fecela ASC";
        $_SESSION[ "CONSULTA_EMPLEADOS" ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        while ( $reg=pg_fetch_assoc ( $consulta ) )
        {
            $this -> empleados[]=$reg ;
        }
        return $this -> empleados ;
    }

    public function get_empleados_id ( $identificacion )
    {

        $sql="SELECT * FROM vw_empleados
                WHERE idsimplex=1
                AND idlicencia=1
                AND identificacion=$identificacion" ;
        $_SESSION[ "CONSULTA_EMPLEADOS_ID" ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        $_SESSION[ "RESULTADO_CONSULTA" ]=$consulta ;
        while ( $reg=pg_fetch_assoc ( $consulta ) )
        {
            $this -> empleados[]=$reg ;
        }
        return $this -> empleados ;
    }

    public function insert_empleados ( $tp_documento , $identificacion , $nombre , $telefono , $email , $direccion , $nacimiento , $estado_civil , $emergencia1 , $emergencia2 , $idsimplex , $idlicencia , $usuela , $tel_emergencia1 , $tel_emergencia2)
    {

        $sql_repetido="SELECT count(*) AS cuantos FROM empleados WHERE identificacion=$identificacion";
        $consulta_repetidos=pg_query(parent::con(),$sql_repetido);
        $reg_repetido=pg_fetch_array($consulta_repetidos);
        $cuantos=$reg_repetido["cuantos"];

        if($cuantos ==  0 )
        {
                $sql="INSERT INTO empleados
                (identificacion,nombre_empleado,telefono,direccion,email_personal,idsimplex,idlicencia,usuela,tp_documento,fecha_nacimiento,estado_civil,contacto_emergencia1,contacto_emergencia2,tel_emergencia1,tel_emergencia2)
                VALUES($identificacion,'" . $nombre . "','" . $telefono . "','" . $direccion . "','" . $email . "',$idsimplex,$idlicencia,$usuela,'" . $tp_documento . "','" . $nacimiento . "','" . $estado_civil . "','" . $emergencia1 . "','" . $emergencia2 . "','".$tel_emergencia1."','".$tel_emergencia2."')" ;
                $_SESSION[ 'INSERT_EMPLEADOS' ]=$sql ;
                $consulta=pg_query ( parent::con () , $sql ) ;

                 if ( $consulta == true )
                {
                    echo 1 ;
                }
                if ( $consulta == false )
                {
                    echo 0 ;
                }
        }
        else
        {
            echo 2;
        }

    }

    public function actualizar_empleados ( $tp_documento , $identificacion , $nombre , $telefono , $email , $direccion , $nacimiento , $estado_civil , $emergencia1 , $emergencia2 , $idsimplex , $idlicencia , $usuela )
    {

        $sql="UPDATE empleados "
                . "SET nombre_empleado='" . $nombre . "'"
                . ",telefono='" . $telefono . "'"
                . ",direccion='" . $direccion . "'"
                . ",email_personal='" . $email . "'"
                . ",idsimplex=$idsimplex"
                . ",idlicencia=$idlicencia"
                . ",user_actualiza=$usuela"
                . ",fecha_actualiza=now()"
                . ",tp_documento='" . $tp_documento . "'"
                . ",fecha_nacimiento='" . $nacimiento . "'"
                . ",estado_civil='" . $estado_civil . "'"
                . ",contacto_emergencia1='" . $emergencia1 . "'"
                . ",contacto_emergencia2='" . $emergencia2 . "'"
                . " WHERE  identificacion=$identificacion" ;
        $_SESSION[ 'UPDATE_EMPLEADOS' ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;

        if ( $consulta == true )
        {
            echo 1 ;
        }
        if ( $consulta == false )
        {
            echo 0 ;
        }
    }

    public function grabar_hv ( $id_empleado , $img , $idsimplex , $idlicencia , $usuela )
    {

        $sql="INSERT INTO hoja_vida 
            (empleado_id,adjunto_hv,idsimplex,idlicencia,usuela,fecela)
            VALUES ($id_empleado,'$img',$idsimplex,$idlicencia,$usuela,now()) " ;
        $_SESSION[ 'SUBIR_HV' ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        $resultado=pg_affected_rows ( $consulta ) ;
        $_SESSION[ "RESULTADO_SUBIR_HV" ]=$resultado ;
        if ( $resultado == 1 )
        {
            return TRUE ;
        }
    }
    
    public function update_hv ( $id_empleado , $img , $usuela )
    {

        $sql="UPDATE hoja_vida SET adjunto_hv='".$img."',usuela=".$usuela.",fecela=now() WHERE empleado_id=$id_empleado" ;
        
        $_SESSION[ 'UPDATE_HV' ]=$sql;
        $consulta=pg_query ( parent::con () , $sql ) ;
        $resultado=pg_affected_rows ( $consulta ) ;
        $_SESSION["RESULTADO_UPDATE_HV"]=$resultado;
        if ( $resultado == 1 )
        {
            return '1' ;
        }
        elseif ($resultado <> 1)
        {
            return '2';
        }
    }

    public function grabar_contrato ( $id_empleado , $cod_contrato , $fecha_ingreso , $salario , $tp_contrato , $contrato_adjunto , $cargo , $idsimplex , $idlicencia , $usuela )
    {

        $salario=str_replace ( "," , "" , $salario ) ;

        $sql="INSERT INTO contratos
            (cod_contrato,empleado_id,fecha_ingreso,cargo_id,salario,adjunto_contrato,idsimplex,idlicencia,usuela,fecela,tipo_contrato)
            VALUES ($cod_contrato,$id_empleado,'$fecha_ingreso',$cargo,$salario,'$contrato_adjunto',$idsimplex,$idlicencia,$usuela,now(),$tp_contrato) " ;

        $_SESSION[ 'SQL_CONTRATO' ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        $resultado=pg_affected_rows ( $consulta ) ;
        $_SESSION[ "RESULTADO_CONTRATO" ]=$resultado ;
        if ( $resultado == 1 )
        {
            return TRUE ;
        }
    }

    public function actualizar_contratos ( $cod_contrato , $empleado_id , $salario , $fecha_ingreso , $cargo_id , $adjunto_contrato , $idsimplex , $idlicencia , $usuela , $tp_contrato )
    {
        $salario=str_replace ( "," , "" , $salario ) ;

        $sql="UPDATE contratos "
                . "SET "
                . "empleado_id=" . $empleado_id . ""
                . ",fecha_ingreso='" . $fecha_ingreso . "'"
                . ",cargo_id='" . $cargo_id . "'"
                . ",salario='" . $salario . "'"
                . ",adjunto_contrato='" . $adjunto_contrato . "'"
                . ",idsimplex=$idsimplex"
                . ",idlicencia=$idlicencia"
                . ",usuela=$usuela"
                . ",fecela=now()"
                . ",tipo_contrato='" . $tp_contrato . "'"
                . " WHERE cod_contrato='$cod_contrato'" ;
        $_SESSION[ 'UPDATE_CONTRATO' ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        $resultado=pg_affected_rows ( $consulta ) ;
        $_SESSION[ 'RESULTADO_CONTRATO' ]=$resultado ;

        if ( $resultado > 0 )
        {
            return TRUE ;
        }
        if ( $resultado == 0 )
        {
            return FALSE ;
        }
    }

    public function get_cargos ()
    {
        $sql="SELECT cargo_id,cargo_des FROM cargos ORDER BY cargo_des " ;
        $_SESSION[ "CONSULTA_CARGOS" ]=$sql ;
        $consulta=pg_query ( parent::con () , $sql ) ;
        while ( $reg=pg_fetch_assoc ( $consulta ) )
        {
            $this -> empleados[]=$reg ;
        }
        return $this -> empleados ;
    }

}

?>