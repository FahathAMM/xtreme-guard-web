<section class="tf-slideshow slider-style2 slider-effect-fade">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false"
        data-space="0" data-space-mb="0" data-loop="true" data-auto-play="false">
        <div class="swiper-wrapper">

            @php
                $imageFiles = [6, 5, 2, 3, 4, 1];
            @endphp

            @foreach ($imageFiles as $i)
                @php
                    $isBlckBg = in_array($i, [4, 5, 6]);
                @endphp

                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="{{ asset("site/images/slider/a$i.png") }}" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <div class="content-slider">
                                    <div class="box-title-slider">
                                        <div @class([
                                            'fade-item fade-item-1 heading title-display',
                                            'text-white' => $isBlckBg,
                                        ])>
                                            Summer 2024 <br> Collection
                                        </div>
                                        <p
                                            class="fade-item fade-item-2 {{ $isBlckBg ? 'text-white' : '' }} body-text-1">
                                            Fresh styles just in! Elevate your look.
                                        </p>
                                    </div>
                                    <div class="fade-item fade-item-3 box-btn-slider">
                                        <a href="shop-default-grid.html" class="tf-btn btn-fill">
                                            <span class="text">Explore Collection</span>
                                            <i class="icon icon-arrowUpRight"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach










        </div>
    </div>
    <div class="wrap-pagination">
        <div class="container">
            <div class="sw-dots sw-pagination-slider type-circle justify-content-center"></div>
        </div>
    </div>
</section>


<section class="tf-marquee">
    <div class="marquee-wrapper">
        <div class="initial-child-container">
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <!-- 2 -->
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <!-- 3 -->
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <!-- 4 -->
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <!-- 5 -->
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <!-- 6 -->
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>
            <div class="marquee-child-item">
                <p class="text-btn-uppercase">Returns are free within 14 days</p>
            </div>
            <div class="marquee-child-item">
                <span class="icon icon-lightning-line"></span>
            </div>



        </div>
    </div>
</section>
