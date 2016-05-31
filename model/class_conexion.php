<?php
class Conectar
{
      protected function con()
    {
        $cadena="host=localhost port=5432 dbname=sgsst user=postgres password=1234567890 options='--client_encoding=UTF8'";
        $con = pg_connect ($cadena) or die ('Error de conexion');
        return $con;
    }
}

?>





