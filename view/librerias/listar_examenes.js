function listar_examenes(dato) {

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: 'valor=' + dato + '&boton=buscar_examen'

    }).done(function (respuesta) {

        var reg = eval(respuesta.trim());

        listar = '  ';
        for (i = 0; i < reg.length; i++)
        {
            if (reg[i]["cargo_des"] == null)
            {
                reg[i]["cargo_des"] = '';
            }


            listar += '<tr>';
            listar += '<td><b>' + reg[i]["empleado_id"] + '</b></td>';
            listar += '<td><b>' + reg[i]["nombre_empleado"] + '</b></td>';
            listar += '<td><b>' + reg[i]["cargo_des"] + '</b></td>';
            listar += '<td align="center"><span style="font-size:12pt;" class="badge badge-blue pull-center"><b>' + reg[i]["cuantos"] + '</b></span></td>';
            listar += '<td><a href="examenes_ocupacionales.php?id=' + reg[i]["empleado_id"] + '&n=' + reg[i]["nombre_empleado"] + '" style="font-size:16pt; border-radius:5px; box-shadow: 3px 2px 5px #4A4A4A;" class="btn btn-blue fa-folder-open " ></a></td>';
            listar += '</tr>';
        }

        listar += ' ';

        $('#cuantos').html('<i class="text-primary">Se han Encontrado <b>' + i + '</b> Empleados</i>');
        $('#listar_examenes').html(listar);
    });
}