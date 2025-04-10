<section class="slides">
    <div class="swiper">
        <div class="swiper-wrapper">
            @for ($s = 0; $s < 5; $s++)
                <a href="https://dummyimage.com/1920x700/" class="swiper-slide" data-fancybox="foto">
                    <img src="https://dummyimage.com/1920x700/">
                </a>
            @endfor
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
