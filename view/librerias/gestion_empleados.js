$(document).on("ready", function ()
{


    var id_get = parseInt($('#id_get').val());

    if (id_get > 0)
    {

        $.ajax({
            url: '../controller/controlador_empleados.php',
            type: 'POST',
            data: 'id_get=' + id_get + '&boton=listar_id'
        }).done(function (respuesta)
        {

            console.log(respuesta);

            var reg = eval(respuesta);


            $.each(reg, function (i, item)
            {
                $('#tipo_documento').val(item.tp_documento);
                $('#identificacion').val(item.identificacion);
                $('#nombre').val(item.nombre_empleado);
                $('#telefono').val(item.telefono);
                $('#email').val(item.email_personal);
                $('#direccion').val(item.direccion);
                $('#nacimiento').val(item.fecha_nacimiento);
                $('#estado_civil').val(item.estado_civil);
                $('#emergencia1').val(item.contacto_emergencia1);
                $('#emergencia2').val(item.contacto_emergencia1);
                $('#id_empleado').val(item.identificacion);
                mostrar_hv = " <object class='col-md-12'  height='600' data='" + item.adjunto_hv + "' ></object>";
                $('#mostrar_hv').html(mostrar_hv);
                $('#img_src').val(item.adjunto_hv);
                $('#cod_contrato').val(item.cod_contrato);
                $('#contrato_cod').val(item.cod_contrato);
                $('#fecha_ingreso').val(item.fecha_ingreso);
                $('#cargo').val(item.cargo_id);
                $('#salario').val(item.salario);
                $('#tp_contrato').val(item.tipo_contrato);
                mostrar_contrato = " <object class='col-md-12'  height='600' data='" + item.adjunto_contrato + "' ></object>";
                $('#contrato_adj').val(item.adjunto_contrato);
                $('#mostrar_contrato').html(mostrar_contrato);
                $('#guardar_contrato').hide();
                $('#actualizar_contrato').show();

                var hv_id = item.hv_id;
                var contrato_id = item.cod_contrato;

                if (hv_id === null)
                {
                    $('#update_hv').hide();
                    $('#subir_hv').show();
                }

                if (contrato_id === null)
                {
                    $('#actualizar_contrato').hide();
                    $('#guardar_contrato').show();
                }

            });




            $('#li-hv').show();
            $('#li-contrato').show();
            $('#actualizar_empleado').show();
            $('#grabar_empleado').hide();
            $('#identificacion').prop({disabled: true});
            $('#nuevo_empleado').show();



        });
    }

});

function grabar_empleado()
{


    if ($('#tipo_documento').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Tipo Documento</b> </p>';
        $('#validacion').html(validacion);
        $('#tipo_documento').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }


    if ($('#identificacion').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Identificacion</b> </p>';
        $('#validacion').html(validacion);
        $('#identificacion').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#nombre').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Nombre Empleado</b> </p>';
        $('#validacion').html(validacion);
        $('#nombre').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#telefono').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Telefono</b> </p>';
        $('#validacion').html(validacion);
        $('#telefono').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#email').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Email Personal</b> </p>';
        $('#validacion').html(validacion);
        $('#email').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#direccion').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Direccion</b> </p>';
        $('#validacion').html(validacion);
        $('#direccion').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#nacimiento').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Fecha Nacimiento</b> </p>';
        $('#validacion').html(validacion);
        $('#nacimiento').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#estado_civil').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Estado Civil</b> </p>';
        $('#validacion').html(validacion);
        $('#estado_civil').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#emergencia1').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Contacto Emergencia 1</b> </p>';
        $('#validacion').html(validacion);
        $('#emergencia1').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#emergencia2').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Contacto Emergencia 2</b> </p>';
        $('#validacion').html(validacion);
        $('#emergencia2').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }


    if ($('#tel_emergencia1').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Telefono Emergencia 1</b> </p>';
        $('#validacion').html(validacion);
        $('#tel_emergencia1').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }

    if ($('#tel_emergencia2').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Telefono Emergencia 2</b> </p>';
        $('#validacion').html(validacion);
        $('#tel_emergencia2').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion').html(validacion);
    }


    var tp_documento = $('#tipo_documento').val();
    var identificacion = $('#identificacion').val();
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var direccion = $('#direccion').val();
    var nacimiento = $('#nacimiento').val();
    var estado_civil = $('#estado_civil').val();
    var emergencia1 = $('#emergencia1').val();
    var emergencia2 = $('#emergencia2').val();
    var tel_emergencia1 = $('#tel_emergencia1').val();
    var tel_emergencia2 = $('#tel_emergencia2').val();

    $.ajax({
        url: '../controller/controlador_empleados.php',
        type: 'POST',
        data: 'tp_documento=' + tp_documento + '&identificacion=' + identificacion + '&nombre=' + nombre + '&telefono=' + telefono + '&email=' + email + '&direccion=' + direccion +
                '&nacimiento=' + nacimiento + '&estado_civil=' + estado_civil + '&emergencia1=' + emergencia1 + '&emergencia2=' + emergencia2 + '&tel_emergencia1=' + tel_emergencia1 + '&tel_emergencia2=' + tel_emergencia2 + '&boton=grabar_empleado'


    }).done(function (respuesta)
    {

        console.log(respuesta);

        if (respuesta.trim() == 1)
        {

            $('#li-hv').show();
            $('#actualizar_empleado').show();
            $('#grabar_empleado').hide();
            $('#id_empleado').val(identificacion);
            $('#identificacion').prop({disabled: true});
            $('#nuevo_empleado').show();

            alerta = '<div class="alert alert-success">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-thumbs-o-up"></i> <b  style="font-size: 12pt;">Excelente!</b>  Empleado Guardado Correctamente';
            alerta += '</div>';
            $('#alertas').html(alerta);

        } else if (respuesta.trim() == 2)
        {
            alerta = '<div class="alert alert-warning">';
            alerta += '<i style="font-size: 17pt;" class="fa fa-warning"></i>  Empleado  que Desea Crear  <b  style="font-size: 12pt;"> Ya Existe.. </b>';
            alerta += '</div>';
            $('#alertas').html(alerta);
        } else
        {
            alerta = '<div class="alert alert-danger">';
            alerta += '<i style="font-size: 17pt;" class="fa fa-times"></i> <b  style="font-size: 12pt;">Error!</b>  No se pudo Guardar El Empleado, Porfavor Verifique La Informacion';
            alerta += '</div>';
            $('#alertas').html(alerta);
        }



    });

}

function actualizar_empleado()
{



    var tp_documento = $('#tipo_documento').val();
    var identificacion = $('#id_empleado').val();
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var direccion = $('#direccion').val();
    var nacimiento = $('#nacimiento').val();
    var estado_civil = $('#estado_civil').val();
    var emergencia1 = $('#emergencia1').val();
    var emergencia2 = $('#emergencia2').val();

    $.ajax({
        url: '../controller/controlador_empleados.php',
        type: 'POST',
        data: 'tp_documento=' + tp_documento + '&identificacion=' + identificacion + '&nombre=' + nombre + '&telefono=' + telefono + '&email=' + email + '&direccion=' + direccion +
                '&nacimiento=' + nacimiento + '&estado_civil=' + estado_civil + '&emergencia1=' + emergencia1 + '&emergencia2=' + emergencia2 + '&boton=actualizar_empleado'


    }).done(function (respuesta)
    {

        console.log(respuesta);

        if (respuesta == 1)
        {

            $('#li-hv').show();
            $('#actualizar_empleado').show();
            $('#grabar_empleado').hide();
            $('#id_empleado').val(identificacion);
            $('#identificacion').prop({disabled: true});
            $('#nuevo_empleado').show();

            alerta = '<div class="alert alert-success">';
            alerta += '<button type="button" class="close" data-dismiss="alert">';
            alerta += '<span aria-hidden="true">&times;</span>';
            alerta += '<span class="sr-only">Close</span>';
            alerta += '</button>';
            alerta += '<i style="font-size: 17pt;" class="fa fa-thumbs-o-up"></i> <b  style="font-size: 12pt;">Exito!</b>  Actualizacion de Empleado Correctamente';
            alerta += '</div>';
            $('#alertas').html(alerta);

        } else
        {
            alerta = '<div class="alert alert-danger">';
            alerta += '<i style="font-size: 17pt;" class="fa fa-times-circle"></i> <b  style="font-size: 12pt;">Error!</b>  No se pudo Actualizar El Empleado, Porfavor Verifique La Informacion';
            alerta += '</div>';
            $('#alertas').html(alerta);
        }


    });
}


function solonumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key == 8 || key == 9))
}

$('#subir_hv').click(function (e)
{
    e.preventDefault();

    var id_empleado = $('#id_empleado').val();
    var img = $('#img_src').val();

    if ($('#img_src').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar  Archivo para Subir  </p>';
        $('#validacion_hv').html(validacion);
        $('#hv').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_hv').html(validacion);
    }

    $('#cargando').modal('show', {backdrop: 'fade'});


    setTimeout(function ()
    {

        $('#cargando').modal('hide');


        $.ajax({
            url: '../controller/controlador_empleados.php',
            type: 'POST',
            data: 'id_empleado=' + id_empleado + '&img=' + img + '&boton=guardar_hv',
        }).done(function (respuesta)
        {



            var resp = respuesta.trim();
            console.log(resp);
            if (resp === 'exito')
            {
                alerta = '<div class="alert alert-success">';
                alerta += '<button type="button" class="close" data-dismiss="alert">';
                alerta += '<span aria-hidden="true">&times;</span>';
                alerta += '<span class="sr-only">Close</span>';
                alerta += '</button>';
                alerta += '<i style="font-size: 17pt;" class="fa fa-thumbs-o-up"></i> <b  style="font-size: 12pt;">Excelente!</b>  Hoja de Vida Agregada Correctamente';
                alerta += '</div>';
                $('#evento_subida').html(alerta);
                $('#li-contrato').show();
                $('#update_hv').show();
                $('#subir_hv').hide();
            }



        });

    }, 2000)


});

$('#update_hv').click(function (e)
{
    e.preventDefault();

    var id_empleado = $('#id_empleado').val();
    var img = $('#img_src').val();

    alert(img);
    alert(id_empleado);

    if ($('#img_src').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar  Archivo para Subir  </p>';
        $('#validacion_hv').html(validacion);
        $('#hv').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_hv').html(validacion);
    }

    $('#cargando').modal('show', {backdrop: 'fade'});

    setTimeout(function ()
    {

        $('#cargando').modal('hide');

        $.ajax({
            url: '../controller/controlador_empleados.php',
            type: 'POST',
            data: 'id_empleado=' + id_empleado + '&img=' + img + '&boton=update_hv',
        }).done(function (respuesta)
        {



            var resp = respuesta.trim();
            console.log(resp);
            if (resp === 'exito')
            {
                alerta = '<div class="alert alert-success">';
                alerta += '<button type="button" class="close" data-dismiss="alert">';
                alerta += '<span aria-hidden="true">&times;</span>';
                alerta += '<span class="sr-only">Close</span>';
                alerta += '</button>';
                alerta += '<i style="font-size: 17pt;" class="fa fa-check-circle"></i> <b  style="font-size: 12pt;">OK !</b>  Hoja de Vida Actulizada Correctamente';
                alerta += '</div>';
                $('#evento_subida').html(alerta);

            } else if (resp === 'error')
            {
                alerta = '<div class="alert alert-warning">';
                alerta += '<button type="button" class="close" data-dismiss="alert">';
                alerta += '<span aria-hidden="true">&times;</span>';
                alerta += '<span class="sr-only">Close</span>';
                alerta += '</button>';
                alerta += '<i style="font-size: 17pt;" class="fa fa-warning"></i> <b  style="font-size: 12pt;"> Oups !</b>  Hubo Un Inconveniente Por favor Intentelo de Nuevo';
                alerta += '</div>';
                $('#evento_subida').html(alerta);
            }



        });

    }, 2000)


});

$('#guardar_contrato').click(function (e)
{
    e.preventDefault();


    if ($('#cod_contrato').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Codigo Contrato</b> </p>';
        $('#validacion_contrato').html(validacion);
        $('#cod_contrato').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_contrato').html(validacion);
    }

    if ($('#fecha_ingreso').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Fecha Ingreso</b> </p>';
        $('#validacion_contrato').html(validacion);
        $('#fecha_ingreso').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_contrato').html(validacion);
    }

    if ($('#cargo').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Cargo</b> </p>';
        $('#validacion_contrato').html(validacion);
        $('#cargo').focus();
        return false;
    } 
    else
    {
        validacion = '';
        $('#validacion_contrato').html(validacion);
    }

    if ($('#salario').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Salario</b> </p>';
        $('#validacion_contrato').html(validacion);
        $('#salario').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_contrato').html(validacion);
    }

    if ($('#tp_contrato').val() === '')
    {
        validacion = '<p class="bg-danger"><i style="font-size:17pt;" class="fa fa-exclamation"></i>  Por Favor Validar El Campo <b>Tipo Contrato</b> </p>';
        $('#validacion_contrato').html(validacion);
        $('#tp_contrato').focus();
        return false;
    } else
    {
        validacion = '';
        $('#validacion_contrato').html(validacion);
    }


    var cod = $('#cod_contrato').val();
    var fecha_ingreso = $('#fecha_ingreso').val();
    var cargo = $('#cargo').val();
    var empleado_id = $('#id_empleado').val();
    var salario = $('#salario').val();
    var tp_contrato = $('#tp_contrato').val();
    var contrato_adjunto = $('#contrato_adj').val();

    if (contrato_adjunto === '')
    {
        contrato_adjunto = '0';
    }

    $('#cargando').modal('show', {backdrop: 'fade'});


    setTimeout(function ()
    {

        $('#cargando').modal('hide');

        $.ajax({
            url: '../controller/controlador_empleados.php',
            type: 'POST',
            data: 'id_empleado=' + empleado_id + '&cod=' + cod + '&fecha_ingreso=' + fecha_ingreso + '&salario=' + salario + '&tp_contrato=' + tp_contrato + '&contrato_adjunto=' + contrato_adjunto.trim() + '&cargo=' + cargo + '&boton=guardar_contrato',
        }).done(function (respuesta)
        {
            var resp = respuesta.trim();
            console.log(resp);
            if (resp === 'exito')
            {
                alerta = '<div class="alert alert-success">';
                alerta += '<button type="button" class="close" data-dismiss="alert">';
                alerta += '<span aria-hidden="true">&times;</span>';
                alerta += '<span class="sr-only">Close</span>';
                alerta += '</button>';
                alerta += '<i style="font-size: 17pt;" class="fa fa-thumbs-o-up"></i> <b  style="font-size: 12pt;">Excelente!</b>  Contrato Agregado Correctamente';
                alerta += '</div>';
                $('#alertas').html(alerta);
                $('#guardar_contrato').hide();
                $('#actualizar_contrato').show();
                $('#cod_contrato').prop({disabled: true});
                $('#contrato_cod').val(cod);

            }



        });

    }, 2000);

});

$('#actualizar_contrato').click(function (e)
{
    e.preventDefault();

    var cod = $('#contrato_cod').val();
    var fecha_ingreso = $('#fecha_ingreso').val();
    var cargo = $('#cargo').val();
    var empleado_id = $('#id_empleado').val();
    var salario = $('#salario').val();
    var tp_contrato = $('#tp_contrato').val();
    var contrato_adjunto = $('#contrato_adj').val();

    $('#cargando').modal('show', {backdrop: 'fade'});


    setTimeout(function ()
    {

        $('#cargando').modal('hide');

        $.ajax({
            url: '../controller/controlador_empleados.php',
            type: 'POST',
            data: 'id_empleado=' + empleado_id + '&cod=' + cod + '&fecha_ingreso=' + fecha_ingreso + '&salario=' + salario + '&tp_contrato=' + tp_contrato + '&contrato_adjunto=' + contrato_adjunto.trim() + '&cargo=' + cargo + '&boton=actualizar_contrato',
        }).done(function (respuesta)
        {
            var resp = respuesta.trim();
            console.log(resp);
            if (resp === 'exito')
            {
                alerta = '<div class="alert alert-success">';
                alerta += '<button type="button" class="close" data-dismiss="alert">';
                alerta += '<span aria-hidden="true">&times;</span>';
                alerta += '<span class="sr-only">Close</span>';
                alerta += '</button>';
                alerta += '<i style="font-size: 17pt;" class="fa fa-check"></i> <b  style="font-size: 12pt;">Excelente!</b>  Contrato actualizado Correctamente';
                alerta += '</div>';
                $('#alertas').html(alerta);
                $('#guardar_contrato').hide();
                $('#actualizar_contrato').show();
                //$('#cod_contrato').prop({disabled: true});
                //$('#contrato_cod').val(cod);

            }



        });

    }, 2000);

});

$('#hv').change(function ()
{
    var formData = new FormData($("#form_subir_hv")[0]);

    $.ajax({
        url: '../controller/controlador_empleados.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (respuesta)
    {

        $('#img_src').val(respuesta);
        mostrar = " <object class='col-md-12'  height='600' data='" + respuesta + "' ></object>";
        $('#mostrar_hv').html(mostrar);

    });

});

$('#file_contrato').change(function ()
{



    var formData = new FormData($("#form_subir_contrato")[0]);


    $.ajax({
        url: '../controller/controlador_adjuntos_contratos.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function ()
        {
            $('#carga').html('<img src="../assets/loader.gif"  id="preloader">');
        },
    }).done(function (respuesta)
    {

        console.log(respuesta);

        $('#contrato_adj').val(respuesta);
        $('#subir_contrato').show();

        mostrar = " <object class='col-md-12'  height='600' data='" + respuesta + "' ></object>";
        $('#mostrar_contrato').html(mostrar);

    });

});


