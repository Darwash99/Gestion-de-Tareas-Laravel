//COMPLETAR TAREA
function TareaCompletada() {
    MostrarCargandoProcesos('Por Favor espere');
    tareai = $("#idtareaacompletar").val()
    tarea = btoa(tareai);
    $.ajax({
        url: '/completartarea',
        type: 'GET',
        data: {tarea: tarea},
        success: function(response) {
            cargarprocesonotificacion.close();
            if(response.status == 'error'){
                MostrarNotificacion('error',response.message)
            }else{
                MostrarNotificacion('successtarea', response.message)
            }
            $('#ModalCompletartarea').modal('hide');
        },
        error: function(xhr, status, error) {
            console.log('Ocurrió un error: ', error);
        }
    });
}

//GUARDAR  TAREA
function GuardarTarea(formData) {
    MostrarCargandoProcesos('Guardando Tarea, Por favor espere');
    if (formData) {
        $.ajax({
            url: '/tarea',
            type: 'POST',
            data: formData,
            success: function(response) {
                cargarprocesonotificacion.close();
                if(response.status == 'error'){
                    MostrarNotificacion('error',response.message)
                }else{
                    MostrarNotificacion('success','Tarea Creada con Exito')
                    document.getElementById('FormulariocrearTarea').reset();
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores aquí
                MostrarNotificacion('error',xhr.responseJSON['message'])
            }
        });
    }
}


