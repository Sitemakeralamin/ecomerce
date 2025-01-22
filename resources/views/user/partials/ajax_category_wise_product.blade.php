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
            <section class="product__section section--padding pt-0" style="padding-bottom: 5rem !important;">
                <div class="container-fluid">                        
                  <div class="product__section--inner">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <a class="" style="" 
                              href="{{route('products', ['category_id'=>$category->id])}}">
                              <img class="" style="border-radius:10px; width:100%;" 
                              src="{{ asset('images/category/'.$category->banner ) }}" alt="{{ $category->title }}">
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