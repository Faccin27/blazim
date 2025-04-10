import.meta.glob([
    '../img/**',
    '../videos/**'
]);

import Swal from 'sweetalert2';
import FormularioHelper from './modulos/formularioHelper.js'
import FuncoesHelper from './modulos/funcoesHelper.js'
import Mapa from './modulos/mapa.js';

window.Swal = Swal;
window.formularioHelper = new FormularioHelper();
window.funcoesHelper = new FuncoesHelper();
window.Mapa = Mapa;

/* Script para envio de formulários */
document.addEventListener("DOMContentLoaded", function () {

    var forms = document.querySelectorAll('[ajax-form]');

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    forms.forEach(form => {

        form.addEventListener('submit', function (event) {

            event.preventDefault();

            window.formularioHelper.enviar(form, csrfToken);

        });
    });
});


