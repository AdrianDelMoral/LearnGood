$(document).ready(function () {

    $(document).on('click', '.add_price', function (event) {
        event.preventDefault();
        // console.log('hello');
        let data = {
            'precio': $('.precio').val(),
            'horas': $('.horas').val(),
        }

        console.log(data);

         // Leido en la Documentacion de Laravel:
         // @url https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token
         //
         // CSRF: para evitar scripts en el formulario

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                // type:'method',
                // url:'url',
                // data: data,
                // dataType: "datatype",
                // success: function(response){}
            type: 'POST',
            url: '/precios',
            data: data,
            dataType: "json",
            success: function (response) {
                // console.log(response.errors.precio);
                // console.log(response);
                if (response.status == 400) {
                    $('#errors_messages').html('');
                    $('#errors_messages').addClass('alert alert-danger');
                    $.each(response.errors, function (key, msj_errors) {
                        $('#errors_messages').append('<li>' + msj_errors + '</li>')
                    });
                } else {
                    // $('#success_message').text(response.message);

                    // deja vacios los mensajes de errores
                    $('#errors_messages').html('');

                    // crea alerta de que se a creado correctamente
                    $('#success_message').addClass('alert alert-success');

                    // Escribe el texto del mensaje de texto creado en el ApiController
                    $('#success_message').text(response.message);

                    // Deja invisible de nuevo el modal
                    $('#addPriceModal').modal('hide');

                    // Vacia los inputs del formulario de precios
                    $('#addPriceModal').find('input').val('');
                }
            }
        });
    });
});
