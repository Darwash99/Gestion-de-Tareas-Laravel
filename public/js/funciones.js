//VALIDAR FORMULARIO CREAR TAREA
function ValidarFormularioTarea() {
    titulo = $('#titulo').val();
    fecha = $('#fecha_vencimiento').val();

    campos = '';
    if(titulo == ''){
        $('#titulo').focus();
        campos += 'Titulo, '
    }
    if(fecha == ''){
        $('#fecha_vencimiento').focus();
        campos += 'Fecha vencimiento '
    }
    if(campos != ''){
        mensaje = `¡Los Siguientes Campos ${campos} No Puede ir Vacios!`;
        MostrarNotificacion('error',mensaje);
        return false;
    }

    var formData = {
        titulo: titulo,
        descripcion: $('#descripcion').val(),
        fecha_vencimiento: fecha,
        _token: $('input[name="_token"]').val() // Token CSRF
    };

    GuardarTarea(formData);
}

//FUNCION PARA MOSTRAR NOTIFIACION DEPENDIENDO EL TIPO
function MostrarNotificacion(tipo,mensaje) {
    if(tipo == 'error'){
        new Noty({
            text: `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>${mensaje}</strong><button type="button" class="btn-close" onclick="this.closest('.alert').style.display='none';" aria-label="Close"></button></div>`,
            type: '',
            layout: 'topRight',
            timeout: 3000,
        }).show();
    }else if(tipo == 'success'){
        new Noty({
            text: `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>${mensaje}</strong>, Si desea volver a las tareas pendientes da click <a href="/tareaspendientes" class="alert-link">AQUI</a><button type="button" class="btn-close" onclick="this.closest('.alert').style.display='none';" aria-label="Close"></button></div>`,
            type: '',
            layout: 'topRight',
            timeout: 5000,
        }).show();
    }else if(tipo == 'successtarea'){
        new Noty({
            text: `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>${mensaje}</strong><button type="button" class="btn-close" onclick="this.closest('.alert').style.display='none';" aria-label="Close"></button></div>`,
            type: '',
            layout: 'topRight',
            timeout: 5000,
        }).show();
    }else if(tipo == 'errorcodigo'){
        new Noty({
            text: `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>${mensaje}</strong><button type="button" class="btn-close" onclick="this.closest('.alert').style.display='none';" aria-label="Close"></button></div>`,
            type: '',
            layout: 'topRight',
            timeout: 5000,
        }).show();
    }

    
}

//MOSTRAR NOTIFICACION CUANDO SE ESTA GUARDANO O COMPLETANDO UNA TAREA EN EL CASO DE QUE SE DEMORE LA PETICIONE ESTA MISMA SIGUE HASTA QUE TERMINA LA PETICION
function MostrarCargandoProcesos(mensaje) {
        cargarprocesonotificacion = new Noty({
            text: `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>${mensaje}</strong><button type="button" class="btn-close" onclick="this.closest('.alert').style.display='none';" aria-label="Close"></button></div>`,
            type: '',
            layout: 'topRight',
        }).show();
}

//ABRIR MODAL DE CONFIRMACION Y AGREGARLE EL ID DE LA TAREA
function Confirmarcompletadotarea(id) {
    //SI EL CHECKBOX ESTA MARCADO
    if ($('#completartarea'+id).is(':checked')) {
        $('#idtareaacompletar').val(id)
        $('#ModalCompletartarea').modal('show');
    }
    
}

