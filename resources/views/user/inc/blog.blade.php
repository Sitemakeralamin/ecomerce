<!-- Start blog section -->
<section class="blog__section section--padding pt-0">
    <div class="container-fluid">
        <div class="section__heading text-center mb-40">
            <h2 class="section__heading--maintitle">From The Blog</h2>
        </div>
        <div class="blog__section--inner blog__swiper--activation swiper">
            <div class="swiper-wrapper">
                @foreach($blogs as $blog)
                    @include('user.inc.blog_item')
                @endforeach
            </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
</section>
<!-- End blog section -->