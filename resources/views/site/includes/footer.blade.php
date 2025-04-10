<footer class="footer flex_c">
    <div class="infoFooter container">
        <div class="main flex_w flex_r middle">
            <div class="enderecoFooter fullW flex middle">
                <figure class="logoF">
                    <a href="{{ route('home') }}" class="whFitImg flex">
                        <img src="https://dummyimage.com/180x65/" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                    </a>
                </figure>

                <div class="flex_c">
                    <p>{!! nl2br($site->endereco) !!}</p>
                    <a href="mailto:{{ $site->email }}" class="whiteFont margin10">{{ $site->email }}</a>
                    <a href="javascript:;" class="whiteFont bold margin10" onclick="funcoesHelper.sendWhatsapp('{{ $site->whatsapp }}', 'Olá, tudo bem? Estava navegando no site {{ config('app.name') }} e gostaria de mais informações.')">
                        {{ $site->whatsapp}}
                    </a>
                    <span class="whiteFont">Atendimento: 8h às 12h - 13h30 às 18h.</span>
                </div>
            </div>
            <div class="sitemapFooter fullW grid4">
                <div class="flex_c gap30">
                    <a href="javascript:;" class="whiteFont medium font15">Notícias</a>
                    <a href="javascript:;" target="_blank" class="whiteFont medium font15">Agenda</a>
                    <a href="javascript:;" class="whiteFont medium font15">Editais</a>
                    <a href="javascript:;" class="whiteFont medium font15">Serviços</a>
                    <a href="javascript:;" class="whiteFont medium font15">Parceiros</a>
                    <a href="javascript:;" class="whiteFont medium font15">Política de Privacidade</a>
                </div>

                <div class="flex_c">
                    <p class="font15 whiteFont margin20">Fundação CETEPI</p>
                    <p class="font15 whiteFont black">Polo Inovale</p>

                    <a href="javascript:;" class="blackFont font15 medium margin15">Primeiros Passos</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Eixos de Desenvolvimento</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Programas Estruturantes</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Modelo de Gestão e Governo</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Atores</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Associe-se</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Downloads</a>
                </div>

                <div class="flex_c footerCentro">
                    <p class="font15 whiteFont black">Centro de Inovação</p>

                    <a href="javascript:;" class="blackFont font15 medium margin15">Quem Somos</a>
                    <a href="javascript:;" class="blackFont font15 medium margin15">Como Funciona</a>
                </div>

                <div class="flex_c footerHabitats">
                    <p class="font15 whiteFont black">Habitats de Inovação</p>

                    <a href="javascript:;" class="blackFont font15 medium margin15">Lorem ipsum</a>

                    <li><a href="javascript:;" class="blackFont font15 medium margin15">Mapa da Inovação</a></li>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="main flex_w flex_r middle">
            <p>Todos os direitos reservados - <a href="admin" target="_blank">Acesso Restrito</a> - <a
                    href="https://webmail.lovatel.com.br" target="_blank">Webmail</a> - Feito por <a href="https://lovatel.com.br" target="_blank">Lovatel</a></p>
        </div>
    </div>
</footer>


{{-- WhatsApp flutuante --}}
<a href="javascript:;" class="whatsFlutuante flex middle"
    onclick="funcoesHelper.sendWhatsapp('{{ $site->whatsapp }}', 'Olá, tudo bem? Estava navegando no site {{ config('app.name') }} e gostaria de mais informações.')">
    <span>Precisa de ajuda?</span>

    <div class="iconWhatsFlutuante">
        <i class="fa-brands fa-whatsapp"></i>
    </div>
</a>
{{-- WhatsApp flutuante --}}

<a href="javascript:;" class="whatsFlutuante flex middle" onclick="funcoesHelper.sendWhatsapp('{{ $site->whatsapp }}', 'Olá, tudo bem? Estava navegando no site {{ config('app.name') }} e gostaria de mais informações.')">
    <span class="showWhats">Podemos Ajudar?</span>

    <div class="iconWhatsFlutuante showWhats pseudoElemento">
        <figure class="whFitImg">
            <img src="{{@Vite::asset('resources/assets/site/img/wppFlutuante.svg')}}" alt="WhatsApp Icon">
        </figure>
    </div>
</a>

<script src="{{ asset('admin-template/extensions/jquery/jquery.min.js') }}"></script>

@vite(['resources/assets/site/js/app.js', 'resources/assets/site/js/jqueryFunctions.js', 'resources/assets/site/js/ckeditor-init.js'])

<!-- Não remover -->
<script src="https://grupolovatel.com.br/api-lgpd/assets/api/js/script.js"></script>
<!-- Não remover -->
<script>
    /* Header fixo */
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 90) {
            $("header").addClass("scroll");
            $("body").addClass("scroll");
        } else {
            $("header").removeClass("scroll");
            $("body").removeClass("scroll");
        }
    });

    /* Header fixo mobile one page */
    $(".dl-menu li").click(function() {
        var destino = $(this).find("a").attr("rel");
        var header = 220;

        $('html, body').animate({
            scrollTop: $("#" + destino).offset().top - header
        }, 800);

        $(".dl-menu li").removeClass("ativo");
        $(this).addClass("ativo");

        $(".mb-menu").removeClass('act');
        $('.hamburger--spin').removeClass('is-active');
        $('#full-menu').removeClass('act');
    });

    /* Scroll section */
    $(".linkSection").click(function() {
        var destino = $(this).attr("rel");
        var header = 220;

        $('html, body').animate({
            scrollTop: $("#" + destino).offset().top - header
        }, 800);
    });
</script>
