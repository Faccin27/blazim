<div id="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @for ($b = 0; $b < 3; $b++)
                <a href="javascript:;" class="swiper-slide flex_c">
                    <figure class="bannerDesk flex">
                        <img src="https://dummyimage.com/1920x700/" alt="Banner">
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
