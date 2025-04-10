
/* WHATSAPP FLUTUANTE */
$(document).ready(function() {
    setTimeout(function() {
        $('.iconWhatsFlutuante').addClass('showWhats');
    }, 3000);
    setTimeout(function() {
        $('.whatsFlutuante span').addClass('showWhats');
        $('.iconWhatsFlutuante').addClass('pseudoElemento');
    }, 6000);
});
/* FIM WHATSAPP FLUTUANTE */

(function ($) {
    $(document).ready(function(){
        $("#mainpop").addClass("show");
    },2500);

    $(".modal_close").click(function(){
        $(".modal_wrap").removeClass("show");
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            $(".modal_wrap").removeClass("show");
        }
    });
})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os itens do menu com submenus
    const menuItems = document.querySelectorAll('.menuMobileContent .dl-menu li');

    menuItems.forEach(item => {
        const submenu = item.querySelector('.dl-subMenu');

        // Verifica se o item contém um submenu
        if (submenu) {
            const toggleSubmenu = () => {
                // Fecha todos os submenus abertos antes de abrir o atual
                menuItems.forEach(i => {
                    if (i !== item) {
                        i.classList.remove('open');
                    }
                });

                // Alterna a classe 'open' no item clicado
                item.classList.toggle('open');
            };

            // Adiciona o evento de clique ao item
            item.addEventListener('click', function (e) {
                // Evita que o clique em um link feche o submenu
                if (e.target.tagName !== 'A') {
                    e.preventDefault();
                }
                toggleSubmenu();
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const fadeElements = document.querySelectorAll('.fade');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, {
        threshold: 0.2 // O elemento será animado quando 10% dele aparecer na tela
    });

    fadeElements.forEach(element => {
        observer.observe(element);
    });
});
