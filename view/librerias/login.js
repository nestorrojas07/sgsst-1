
function cerrar()
        {
                $.ajax({
                    url:'../controller/controlador_login.php',
                    type:'POST',
                    data:'boton=cerrar'
                }).done(function(respuesta){
                     location.href='login.php';
                });

            }


