class Auth {

    OpenForgot() {
        $('.entrar').fadeOut('fast', function () {
            $('.trocar').fadeIn('fast');
        });
    }

    OpenLogin() {
        $('.trocar').fadeOut('fast', function () {
            $('.entrar').fadeIn('fast');
        });
    }

    Login(event, el) {
        event.preventDefault();
        const form = $(el);
        this.SendForm(form);
    }

    Forgot(event, el) {
        event.preventDefault();
        const form = $(el);
        this.SendForm(form);
    }

    SendForm(form){
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                if (response.redirecionamento != undefined && response.redirecionamento != "") {
                    window.location.href = response.redirecionamento;
                } else {
                    Swal.fire("Sucesso!", response.mensagem, "success").then(function () {
                        Form.trigger('reset');
                    });
                }
            },
            error: function (reject) {
                const response = reject.responseJSON;

                Swal.fire("Falha!", response.erro, "error");
            }
        });
    }
}

export default Auth;
