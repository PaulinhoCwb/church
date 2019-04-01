$(document).ready(function () {
    $('form#contact-us').submit(function (event) {
        event.preventDefault();
        let url = $(this).attr('action');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                nome: $('#name').val(),
                email: $('#email').val(),
                mensagem: $('#mensagem').val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                toastr.info('Mensagem enviada com successo!!!');
            },
            error: function (data) {
                toastr.error('Erro ao enviar!!!');
            }
        });
    });
});
