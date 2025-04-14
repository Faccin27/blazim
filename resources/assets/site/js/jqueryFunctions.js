
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

// Function to toggle modal visibility
function toggleModal() {
    const modal = document.getElementById('loginModal');

    if (modal) {
        if (modal.style.display === "block") {
            modal.style.display = "none";
        } else {
            modal.style.display = "block";
        }
    } else {
        console.error("Modal element with ID 'loginModal' not found");
    }
}

$(document).ready(function() {
    console.log("jQuery ready");

    // Get elements
    const $loginButton = $('.btnLogin');
    const $modal = $('#loginModal');

    if ($loginButton.length === 0) {
        console.error("Login button not found");
        return;
    }

    if ($modal.length === 0) {
        console.error("Modal not found");
        return;
    }

    // Set initial state
    $modal.hide();

    // Setup click handler
    $loginButton.on('click', function(e) {
        e.preventDefault();
        console.log("Button clicked via jQuery");
        $modal.show();
    });

    // Setup close button
    $('.close').on('click', function() {
        $modal.hide();
    });

    // Close when clicking outside
    $(window).on('click', function(event) {
        if (event.target === $modal[0]) {
            $modal.hide();
        }
    });
});
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
