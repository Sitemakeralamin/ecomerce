
<!-- Start slider section -->
<div class="container-fluid">
    <div class="row slider-p pb-0">
        <div class="col-md-8 slider-pb">
            <section class="hero__slider--section">
                <div class="hero__slider--inner hero__slider--activation swiper">
                    <div class="hero__slider--wrapper swiper-wrapper">
                        @foreach($sliders as $slider) 
                        <div class="swiper-slide ">
                            <div class="hero__slider--items home1__slider--bg" style="
                                background:url('{{ asset('images/slider/'.$slider->image ) }}'); 
                                ">
                                <div class="container-fluid">
                                    <div class="hero__slider--items__inner">
                                        <div class="row row-cols-1">
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <div class="row mb--n28">
                <div class="col-lg-12 mb-28">
                    <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach($sliderSideBanner as $slider) 
                            <div class="col-lg-12 col-md-12 col-6 mb-3">
                                <div class="banner__items">
                                    <a class="banner__items--thumbnail position__relative" href="{{optional($slider)->link}}">
                                        <img class="banner__items--thumbnail__img slider-side-banner" src="{{ asset('images/slider/side-banner/'.optional($slider)->image) }}" alt="banner-img"> 
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> 
<!-- End slider section -->