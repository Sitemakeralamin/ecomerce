@if ($product_with_categories->isNotEmpty())
    @foreach($product_with_categories as $pwc)
      @php
      $product_with_categories_ids = App\Models\ProductWithCategory::where('category_id',$pwc->category_id)
          ->select('product_id')
          ->get();
          $products = App\Models\Product::whereIn('id',$product_with_categories_ids)
          ->limit(10)
          ->get();
      @endphp
      @if ($products->isNotEmpty())
        @php
            $category = App\Models\Category::where([
                'id'=>$pwc->category_id,
                'parent_id'=>0,
                'is_featured'=>1,
                'is_active'=>1,
                ])->first();
        @endphp
        @if ($category) 
          
          {{-- <section class="blog__section section--padding pt-0" style="padding-bottom: 5rem !important;">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <a class="" style="" 
                        href="{{route('products', ['category_id'=>$category->id])}}">
                        <img class="" style="border-radius:10px; width:100%;" 
                        src="{{ asset('images/category/'.$category->banner ) }}" alt="{{ $category->title }}">
                        </a>
                  </div>
                </div>
                <div class="blog__section--inner blog__swiper--activation swiper">
                      <div class="swiper-wrapper">
                      @foreach($products as $index => $product)
                        @include('user.partials.category_wise_product')
                      @endforeach
                      </div>
                      <div class="swiper__nav--btn swiper-button-next"></div>
                      <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
          </section> --}}

            <section class="product__section section--padding pt-0" style="padding-bottom: 5rem !important;">
                <div class="container-fluid">                        
                  <div class="product__section--inner">
                      <div class="row py-4">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <a class="" style="" 
                              href="{{route('products', ['category_id'=>$category->id])}}">
                              <img class="" style="border-radius:10px; width:100%;" 
                              src="{{ asset('images/category/'.$category->banner ) }}" alt="{{ $category->title }}">
                              </a>
                        </div>
                      </div>
                      <div class="section__heading mb-2 border-bottom d-flex">
                        <h2 class="section__heading-- style2 flex-grow-1">{{ $category->title }}</h2>
                        <div class="btn_custom mb-2">
                            <a class=" rounded shop_more_btn" 
                            href="{{route('products', ['category_id'=>$category->id])}}">Shop More
                                <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                      <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-2 mb--n30">
                            @foreach($products as $index => $product)
                                    @include('user.partials.category_wise_product')
                            @endforeach
                        </div>  
                      </div>
                  </div>  
                </div>
            </section>
        @endif
      @endif
    @endforeach
@endif