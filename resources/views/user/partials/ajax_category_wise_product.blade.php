@if ($product_with_categories->isNotEmpty())
    @foreach($product_with_categories as $pwc)
    @php
    $product_with_categories_ids = App\Models\ProductWithCategory::where('category_id',$pwc->category_id)
        ->select('product_id')
        ->get();
        $products = App\Models\Product::whereIn('id',$product_with_categories_ids)
        ->limit(8)
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
                                <div class="row pb-0">
                                    
                                    <div class="col-md-4 mt-3">
                                        <a href="{{route('products', ['category_id'=>$category->id])}}">
                                        <img class="cat-image" style="" src="{{ asset('images/category/'.$category->banner ) }}" alt="{{ $category->title }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8 mt-3">
                                        {{-- category Name --}}
                                        <div class="row text-dark text-left mb-3 shadow" 
                                             style="background-color: var(--logo-color); border-radius:5px;">
                                             <div class="col-md-6">
                                                 <h2 class="pl-3 p-2 text-white">{{ $category->title }}</h2>
                                             </div>
                                             <div class="col-md-6 text-right">
                                                <h4 class="p-2 text-white mt-2">
                                                    <a href="{{route('products', ['category_id'=>$category->id])}}">Shop More</a>
                                                </h4>
                                             </div>
                                        </div>
                                        <div class="row 
                                            row-cols-xxl-4 
                                            row-cols-xl-4
                                            row-cols-lg-4 
                                            row-cols-md-3 
                                            row-cols-2">
                                            @foreach($products as $product)
                                                @include('user.partials.category_wise_product')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif    
                    
                    </div>
                </section>
    @endif
    @endforeach
@endif
