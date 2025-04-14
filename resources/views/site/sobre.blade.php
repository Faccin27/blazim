@extends('site.layouts.base')

@section('title', 'Produtos - ' . config('app.name'))

@section('conteudo')

    <section class="preHeader flex">
        <div class="main flex_c t-center middle">
            <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">QUEM SOMOS</h1>
        </div>
    </section>

    <main class="mainSobre container">
        <div class="main flex_c about_us">
            <div class="grid2 about_box">
                <div>
                    <h1 class="about_title margin50">Blazim Distribuidora – Excelência em Conectar Marcas ao Varejo</h1>
                    <div class="about_description">
                            <p>A Blazim Distribuidora é uma empresa especializada na distribuição de produtos voltados à saúde,
                                beleza, higiene e bem-estar. Com atuação sólida no mercado e um portfólio amplo e diversificado,
                                somos o elo entre grandes marcas e o varejo, entregando soluções completas para atender às
                                necessidades do consumidor moderno.</p>

                            <p>
                                Nosso compromisso vai além da logística. Trabalhamos com foco em excelência operacional,
                                relacionamento transparente com clientes e parceiros, e um time preparado para oferecer
                                atendimento ágil, personalizado e de qualidade.
                            </p>
                            <p>Valorizamos a confiança construída com nossos fornecedores e a fidelidade de nossos clientes, que
                                reconhecem na Blazim um parceiro estratégico para o crescimento sustentável de seus negócios.
                            </p>
                            <p>Com estrutura eficiente, logística integrada e visão de futuro, seguimos expandindo nossa
                                presença no mercado, sempre guiados por valores como seriedade, comprometimento e ética.</p>
                            <p>Blazim Distribuidora – sua parceira de confiança na distribuição.</p>
                    </div>
                </div>
                <div class="about_image">
                    <div class="flex_c middle">
                            <figure>
                                <img src="https://dummyimage.com/550x450/" alt="nome produto">
                            </figure>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection


@section('pageScripts')
    <script>
        $(function() {
            $(".menuProduto li a").click(function() {
                // Fechar todos os outros submenus
                $(".menuProduto li a").not(this).next().slideUp();

                // Remover a classe 'ativo' de todos os outros itens
                $(".menuProduto li").not($(this).parent()).removeClass('ativo');

                // Alternar o submenu do item clicado
                $(this).next().slideToggle();

                // Adicionar a classe 'ativo' ao item clicado
                $(this).parent().toggleClass('ativo');
            });
        });

        $('.filtrarProd').click(function() {
            $('.filtroMobile').toggleClass('showF');
        });

        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.href.includes('?busca')) {
                const rightProdutos = document.querySelector('.rightProdutos.flex_c');
                if (rightProdutos) {
                    rightProdutos.classList.add('fullW');
                }
            }
        });
    </script>

@endsection
