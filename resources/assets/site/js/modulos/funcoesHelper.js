class FuncoesHelper {

    sendWhatsapp(numero, mensagem, international = false) {

        if (numero === undefined || numero === "" || mensagem === undefined || mensagem === "") {

            throw new Error("Não foi informado o Número de celular ou a Mensagem de envio.");
        }

        mensagem = window.encodeURI(mensagem);

        numero = numero.replace(/[^0-9]+/g, '');

        if (!international) {

            numero = "55" + numero;
        }

        if (this.isMobile()) {
            window.open("https://api.whatsapp.com/send?phone=" + numero + "&text=" + mensagem, '_blank');
        } else {
            window.open("https://web.whatsapp.com/send?phone=" + numero + "&text=" + mensagem, '_blank');
        }
    }

    isMobile() {
        if (navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/BlackBerry/i) ||
            navigator.userAgent.match(/Windows Phone/i)
        ) {
            return true; // está utilizando celular
        } else {
            return false; // não é celular
        }
    }

    nl2br(str, is_xhtml) {
        if (typeof str === 'undefined' || str === null) {
            return '';
        }
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
}

export default FuncoesHelper;
