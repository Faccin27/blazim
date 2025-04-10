@extends('site.layouts.base')
@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    @vite(['resources/assets/site/css/slides.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endsection
@section('conteudo')
    <div id="banner2">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @for ($b = 0; $b < 3; $b++)
                    <a href="javascript:;" class="swiper-slide flex_c">
                        <figure class="bannerDesk flex">
                            <img <img src="{{ @Vite::asset('resources/assets/site/img/banner.png') }}" alt="Banner">
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
    </script>
@endsection
