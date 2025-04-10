class CrudHelper {

    Cadastrar(event, el) {

        event.preventDefault();

        var Form = $(el);

        var data = new FormData(Form[0]);

        $.ajax({
            type: "post",
            url: Form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('.progress').show();
                        $('.progress-bar').css('width', percentComplete + '%');
                    }
               }, false);
               return xhr;
            },
            beforeSend: function(){
                $('#botao-enviando').show();
                $('#botao-cadastrar').hide();
            },
            success: function (response) {

                Swal.fire("Sucesso!", response.mensagem, "success").then(function () {

                    if (response.redirecionamento != undefined && response.redirecionamento != "") {

                        window.location.href = response.redirecionamento;

                    } else {

                        Form.trigger('reset');

                    }
                });

                $('.progress').hide();
                $('#botao-enviando').hide();
                $('#botao-cadastrar').show();

            },
            error: function (reject) {

                const response = reject.responseJSON;

                const message = reject.status >= 500 && reject.status < 600 ? "Ocorreu um erro interno no servidor." : response.erro;

                Swal.fire("Falha!", message, "error");

                $('.progress').hide();
                $('#botao-enviando').hide();
                $('#botao-cadastrar').show();
            }
        });
    }

    Alterar(event, el) {

        event.preventDefault();

        var Form = $(el);

        var data = new FormData(Form[0]);

        $.ajax({
            type: "post",
            url: Form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function(){
                $('#botao-enviando').show();
                $('#botao-alterar').hide();
            },
            success: function (response) {

                Swal.fire("Sucesso!", response.mensagem, "success");

                $('#botao-enviando').hide();
                $('#botao-alterar').show();

            },
            error: function (reject) {

                const response = reject.responseJSON;

                const message = reject.status >= 500 && reject.status < 600 ? "Ocorreu um erro interno no servidor." : response.erro;

                Swal.fire("Falha!", message, "error");

                $('.progress').hide();
                $('#botao-enviando').hide();
                $('#botao-alterar').show();

            }
        });
    }

    AlterarArquivos(event, el) {

        event.preventDefault();

        var Form = $(el);

        var data = new FormData(Form[0]);

        $.ajax({
            type: "post",
            url: Form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('.progress').show();
                        $('.progress-bar').css('width', percentComplete + '%');
                    }
               }, false);
               return xhr;
            },
            beforeSend: function(){
                $('#botao-enviando').show();
                $('#botao-alterar').hide();
            },
            success: function (response) {

                Swal.fire("Sucesso!", response.mensagem, "success").then(function(){
                    location.reload();
                });

                $('.progress').hide();
                $('#botao-enviando').hide();
                $('#botao-alterar').show();

            },
            error: function (reject) {

                const response = reject.responseJSON;

                const message = reject.status >= 500 && reject.status < 600 ? "Ocorreu um erro interno no servidor." : response.erro;

                Swal.fire("Falha!", message, "error");

                $('.progress').hide();
                $('#botao-enviando').hide();
                $('#botao-alterar').show();

            }
        });
    }

    Remover(el) {

        Swal.fire({
            icon: 'error',
            title: 'Atenção',
            text: 'Você realmente deseja Excluir este Item?',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.isConfirmed) {

                const button = $(el);

                $.ajax({
                    type: "POST",
                    url: button.data('rota'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function (response) {

                        location.reload();

                    },
                    error: function (reject) {

                        const response = reject.responseJSON;

                        const message = reject.status >= 500 && reject.status < 600 ? "Ocorreu um erro interno no servidor." : response.erro;

						Swal.fire("Falha!", message, "error");

                        $('.progress').hide();
                        $('#botao-enviando').hide();
                        $('#botao-alterar').show();

                    }
                });
            }
        });

    }

    Legenda(event, el) {

        event.preventDefault();

        const form = $(el).parents('form');

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form.serialize(),
            dataType: "json",
            success: function (response) {

                if (response.tipo == "success") {

                    location.reload();

                }
            }
        });
    }
}

export default CrudHelper;
