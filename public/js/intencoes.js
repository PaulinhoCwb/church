$(document).ready(function () {
    $('form#falecimento').submit(function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                contato: $('#contato').val(),
                fone: $('#fone').val(),
                hora: $('#hora').val(),
                data: $('#data'),
                nome: $('#nome').val(),
                falecimento: $('input[name="falecimento"]'),
                type: $('input[name="type"]').val()
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
    $('form#intencao').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                contato: $('#contato').val(),
                fone: $('#fone').val(),
                hora: $('#hora').val(),
                data: $('#data').val(),
                intencao: $('#intencao').val(),
                type: $('input[name="type"]').val()
            },
            success: function (data) {
                toastr.info('Mensagem enviada com successo!!!');
            },
            error: function (data) {
                toastr.error('Erro ao enviar!!!');
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    });
});