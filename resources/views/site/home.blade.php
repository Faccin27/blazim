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
            <section class="slides">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @for ($s = 0; $s < 5; $s++)
                            <a href="javascript:;" class="swiper-slide item_marcas">
                                <img src="{{ @Vite::asset('resources/assets/site/img/powerdent.png') }}" >
                            </a>
                        @endfor
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
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
    </script>
@endsection
