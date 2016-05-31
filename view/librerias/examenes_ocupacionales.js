function set_empleado(datos) {

    var registros = datos.split("*");
    $('#identificacion').append(registros[0]);
    $('#user').append(registros[1]);
    $('#empleado_id').val(registros[0]);
    $('#buscar_empleado').modal('hide');
    $('#encabezado').show();
    $('#panel_buscar').hide();
    $('#agregar_examen').show();

}

function agregar_examen() {
    
    $('#modal_agregar_examenes').modal('show');


}

function llenar_modal(dato){
 var date = dato.split("*");
$('#modal_agregar_examenes').modal('show');
$('#guardar_examen').hide();
$('#titulo').val(date[1]);
$('#observacion').val(date[2]);
$('#img_src').val(date[3]);
mostrar ='<object class="col-sm-12" height="700" data="'+date[3]+'"></object>';
$('#mostrar_examen').html(mostrar);
$('#id_examen').val(date[0]);

}

function grabar_examen() {

    var titulo = $('#titulo').val();
    var observacion = $('#observacion').val();
    var adjunto = $('#img_src').val();
    var empleado_id = $('#empleado_id').val();

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: 'titulo=' + titulo + '&observacion=' + observacion + '&adjunto=' + adjunto + '&empleado_id=' + empleado_id + '&boton=grabar_examen'

    }).done(function (respuesta)
    {
        
         $('#modal_agregar_examenes').modal('hide');
       
        if (respuesta.trim() === 'exito')
        {
            alerta = '<div class="alert alert-success">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-check-circle"></i> <b  style="font-size: 12pt;"> Excelente : </b> Examen Agregado Correctamente ';
            alerta += '</div>';
            $('#alertas').html(alerta);
            
            
            $('#titulo').val('');
            $('#observacion').val('');
            $('#img_src').val('');
            $('#examen').val('');
            $('#mostrar_examen').hide();
            
            listar_examen();
            
        } else
        {
            alerta = '<div class="alert alert-danger">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-times-circle"></i> <b  style="font-size: 12pt;"> Error : </b> No se pudo agregar Examen,Verique Informacion ';
            alerta += '</div>';
            $('#alertas').html(alerta);
        }

    });
}


function actualizar_examen() {

    var titulo = $('#titulo').val();
    var observacion = $('#observacion').val();
    var adjunto = $('#img_src').val();
    var id_examen = $('#id_examen').val();

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: 'titulo=' + titulo + '&observacion=' + observacion + '&adjunto=' + adjunto + '&id_examen=' + id_examen + '&boton=actualizar_examen'

    }).done(function (respuesta)
    {
         
         $('#modal_agregar_examenes').modal('hide');
       
        if (respuesta.trim() === 'exito')
        {
            alerta = '<div class="alert alert-success">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-check-circle"></i> <b  style="font-size: 12pt;"> Excelente : </b> Examen Actualizado Correctamente ';
            alerta += '</div>';
            $('#alertas').html(alerta);
            
            
            $('#titulo').val('');
            $('#observacion').val('');
            $('#img_src').val('');
            $('#examen').val('');
            $('#mostrar_examen').hide();
            
            listar_examen();
            
        } else
        {
            alerta = '<div class="alert alert-danger">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-times-circle"></i> <b  style="font-size: 12pt;"> Error : </b> No se pudo agregar Examen,Verique Informacion ';
            alerta += '</div>';
            $('#alertas').html(alerta);
        }

    });
}

function eliminar_examen(dato){
    
   var examen_id = dato;
   
   $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: 'examen_id=' + examen_id + '&boton=eliminar_examen'

    }).done(function(respuesta)
    {
       console.log(respuesta);
        listar_examen();
    });
   
}

function listar_examen() {

    var empleado_id = $('#empleado_id').val();

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: 'empleado_id=' + empleado_id + '&boton=listar_examen'

    }).done(function (respuesta)
    {
         
        var reg = eval(respuesta);
        
            var cuantos = reg.length;
            
            html=' ';
        $.each(reg,function(i,item){
            
             var  datos=item.examen_id+'*'+item.titulo+'*'+item.observacion+'*'+item.anexo;
             
             html+='<div class="panel panel-default">';
             html+='<div class="panel-heading">';
             html+='<h4 class="panel-title">';
             html+='<a data-toggle="collapse" data-parent="#listar_examenes" href="#'+item.examen_id+'" class="collapsed"> '+item.titulo+' </a>';
             html+='<div align="center" class="panel-options">';
             html+='<a href="#">';
             html+='<i onclick="eliminar_examen('+item.examen_id+');"  style="margin: 5px;" class="fa-trash"></i>';
             html+='</a> ';
             html+='<a href="#">   ';
             html+="<i onclick='llenar_modal(" + '"' + datos + '"' + ");' style='margin: 5px;' class='fa fa-pencil-square-o'></i>";
             html+='</a>  ';
             html+='</div>';
             html+='</h4>';
             html+='</div>';

             html+='<div id="'+item.examen_id+'" class="panel-collapse collapse">';
             html+='<div class="panel-body">';
             html+='<div align="center" class="col-md-12">';
             html+='<b>Observacion: </b>';
             html+='<br>';
             html+='<p> '+item.observacion+' </p>';
             html+='</div>';

             html+='<div style="margin-top: 10px;"class="col-md-12">';
             html+='<object class="col-sm-12" height="700" data="'+item.anexo+'"></object>';
             html+='</div>';
             html+='</div>';
             html+='</div>';
             html+='</div>';
            
            
                         
        });
            html+=' ';
            
            $('#listar_examenes').html(html);
            $('#cuantos_doc').html(cuantos);
            
    });
}


$('#examen').change(function ()
{

    var formData = new FormData($("#form_subir_examen")[0]);

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (respuesta)
    {

        $('#img_src').val(respuesta.trim());
        mostrar = " <object class='col-md-12'  height='600' data='" + respuesta + "' ></object>";
        $('#mostrar_examen').show();
        $('#mostrar_examen').html(mostrar);
    });

});


function buscar_empleado()
{
    var parametro = $('#buscar').val();

    $.ajax({
        url: '../controller/controlador_examenes_ocupacionales.php',
        method: 'POST',
        data: 'parametro=' + parametro + '&boton=buscar_empleados'

    }).done(function (respuesta) {

        var resp = eval(respuesta);

        html = '<div>';

        $.each(resp, function (i, item) {
            datos = item.identificacion + "*" + item.nombre_empleado;
            html += '<tr align="center">';
            html += '<td>' + item.identificacion + '</td>';
            html += '<td>' + item.nombre_empleado + '</td>';
            html += '<td>' + item.cargo_des + '</td>';
            html += "<td><buttom onclick='set_empleado(" + '"' + datos + '"' + ");' style='border-radius:7%;' class='btn btn-blue'><i class='fa fa-download'></i></buttom></td>";
            html += '</tr>';
        });
        html += '</div>';
        $('#buscar_empleado').modal('show');
        $('#lista_empleados').html(html);




    });


}


