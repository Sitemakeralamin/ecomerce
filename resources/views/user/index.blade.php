
@extends('user.inc.master')
@php( $business_info = business_info() )
@section('title') Welcome To  @endsection
@section('description'){{optional($business_info)->meta_description}}@endsection
@section('keywords'){{optional($business_info)->meta_keywords}}@endsection

@section('content')

@include('user.partials.slider')

<section class="team__section py-4 mt-10">
    <div class="container-fluid">
        <div class="section__heading text-center mb-50 d-none">
            <h2 title="Get your desired product from featured category" class="section__heading--maintitle">{{ __('messages.Featured Categories') }}</h2>
        </div> 
            <div class="row 
            row-cols-xxl-6
            row-cols-xl-6
            row-cols-lg-6
            cat-cols-md-3 
            cat-cols-sm-3 
            cat-cols-3
            ">
                 @foreach($featured_categories as $category)
                 <div class="p-2">
                     <div class="rounded shadow cat-zoom cat-py-5 cat-box">
                         <a href="{{route('products', ['category_id'=>$category->id])}}">
                            <div class="row text-center">
                                <div class="col-12">
                                    <img class="cat-image" style="" src="{{ asset('images/category/'.$category->image ) }}" alt="{{ $category->title }}">
                                </div>
                                <div class="col-12 cat-title-box">
                                    <p class="cat-title"> {{ __translate($category->title, $category->bn_title) }} </p> 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>
{{-- Category wise Product --}}
<div id="category_wise_product">
    <section class="product__section section--padding pt-0"  style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>    
</div>
{{-- Featured Products --}}
<div id="featured_products">
    <section class="product__section section--padding pt-0"  style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>  
</div>
{{-- <div id="flash_sale_offer"></div> --}}
@include('user.partials.home_page_four_banner')
{{-- Trending Now --}}
<div id="trending_now">
    <section class="product__section section--padding pt-0"  style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>  
</div>
{{-- <div id="best_selling_products"></div> --}}
{{-- featured brands section --}}
<!-- Start testimonial section -->
@include('user.inc.testimonial')
<!-- End testimonial section -->
@if($blogs->isNotEmpty())
    @include('user.inc.blog')
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $( window ).on('load', function () {
        featured_products();
        trending_now();
        category_wise_product();
        //best_selling_products();
        //flash_sale_offer();
    });
</script>
@endsection

