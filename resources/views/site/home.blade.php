@extends('site.layouts.base')
@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    @vite(['resources/assets/site/css/slides.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endsection
@section('conteudo')
    <section class="bannermain">
        <div id="banner2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @for ($b = 0; $b < 3; $b++)
                        <a href="javascript:;" class="swiper-slide flex_c">
                            <figure class="bannerDesk flex">
                                <img src="{{ @Vite::asset('resources/assets/site/img/banner.png') }}" alt="Banner">
                            </figure>

                            <figure class="bannerMobile flex">
                                <img src="https://dummyimage.com/900x900/" alt="Banner">
                            </figure>
                        </a>
                    @endfor
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="forslides container">
        <div class="main flex_c">
            <section class="slides margin80">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @for ($s = 0; $s < 5; $s++)
                            <a href="javascript:;" class="swiper-slide item_marcas">
                                <img src="{{ Vite::asset('resources/assets/site/img/powerdent.png') }}">
                            </a>
                        @endfor
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
        </div>
    </section>

    <section class="forslides container">
        <div class="main flex_c">
            <section class="products flex_c">
                <div class="t-center center margin40">
                    <h1 class="products_title">Produtos em destaque</h1>
                </div>
                <section class="slides_prod fullW">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @for ($s = 0; $s < 5; $s++)
                                <div class="swiper-slide item_produtos">
                                    <div class="card_produto">
                                        <img src="{{ Vite::asset('resources/assets/site/img/product.png') }}"
                                            class="produto_img">
                                        <h2 class="produto_titulo">Máscara Calmante Facial 250g</h2>
                                        <p class="produto_marca">Vedis</p>
                                        <button class="btn_login">
                                            FAÇA LOGIN <br> PARA COMPRAR
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                                viewBox="0 0 19 18" fill="none">
                                                <g clip-path="url(#clip0_1_37)">
                                                    <path d="M2 9H17M17 9L10.25 2.25M17 9L10.25 15.75" stroke="white"
                                                        stroke-width="2" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_37">
                                                        <rect width="18" height="18" fill="white"
                                                            transform="translate(0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </section>
            </section>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        //Inicio de FancyBox
        Fancybox.bind("[data-fancybox]", {
            // Configurações gerais do Fancybox
            Images: {
                initialSize: "fit",
                Panzoom: {
                    maxScale: 2,
                },
            }
        });

        var swiper = new Swiper('#banner2 .swiper-container', {
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            loop: true,
            speed: 2000,
            centeredSlides: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '#banner2 .swiper-pagination',
                clickable: true,
            },
            allowTouchMove: false,
        });

        var swiper = new Swiper('.slides .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 20,
            slidesPerGroup: 1,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            loop: true, // Adicionado o loop
            navigation: {
                nextEl: '.slides .swiper-button-next',
                prevEl: '.slides .swiper-button-prev',
            },
            pagination: {
                el: '.slides .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1150: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                750: {
                    slidesPerView: 2,
                },
                599: {
                    slidesPerView: 1,
                }
            }
        });

        var swiper = new Swiper('.slides_prod .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 20,
            slidesPerGroup: 1,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            loop: true, // Adicionado o loop
            navigation: {
                nextEl: '.slides_prod .swiper-button-next',
                prevEl: '.slides_prod .swiper-button-prev',
            },
            breakpoints: {
                1150: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                750: {
                    slidesPerView: 2,
                },
                599: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
@endsection
