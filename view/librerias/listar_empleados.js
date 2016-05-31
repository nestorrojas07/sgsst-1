

function listar_empleados ( dato ){
   
    $.ajax({
        url:'../controller/controlador_empleados.php',
        type:'POST',
        data:'valor='+dato+'&boton=buscar_empleado'
        
    }).done(function(respuesta){
        
        var reg = eval(respuesta);
        var cuantos = reg.count;
        listar='<div></div>';
        for (i=0;  i<reg.length; i++)
        {
            if (reg[i]["cargo_des"] == null)
            {
                reg[i]["cargo_des"]='';
            }
            if (reg[i]["fecha_ingreso"] == null)
            {
                reg[i]["fecha_ingreso"]='';
            }
            
            listar+='<tr>';
            listar+='<td><b>'+i+'</b></td>';
            listar+='<td><b>'+reg[i]["identificacion"]+'</b></td>';
            listar+='<td><b>'+reg[i]["nombre_empleado"]+'</b></td>';
            listar+='<td><b>'+reg[i]["telefono"]+'</b></td>';
            listar+='<td><b>'+reg[i]["cargo_des"]+'</b></td>';
            listar+='<td><b>'+reg[i]["fecha_ingreso"]+'</b></td>';
            listar+='<td><a href="empleados.php?id='+reg[i]["identificacion"]+'" style="font-size:16pt; border-radius:5px; box-shadow: 3px 2px 5px #4A4A4A;" class="btn btn-blue fa-folder-open " ></a></td>';
            listar+='</tr>';
        } 
       
        listar+='<div></div>';
        
        $('#cuantos').html('<i class="text-primary">Se han Encontrado <b>'+i+'</b> Empleados</i>');
        $('#listar_empleados').html(listar);
    });
}