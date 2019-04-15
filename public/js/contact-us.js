$(document).ready(function () {
    $('form#contact-us').submit(function (event) {
        event.preventDefault();
        let url = $(this).attr('action');
        console.log($(this)[0]);
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
                if (data.msg) {
                    toastr.info('Mensagem enviada com successo!!!');
                    $('#name').val("");
                    $('#email').val("");
                    $('#mensagem').val("");
                } else {
                    toastr.error('Erro ao enviar!!!');
                }
            },
            error: function (data) {
                toastr.error('Erro ao enviar!!!');
            }
        });
    });
});
