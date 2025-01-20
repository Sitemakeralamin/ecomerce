 <style>
    .category-wise-product-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .category-wise-product-header h2 {
      font-size: 24px;
      color: white; /* Purple */
    }

    .category-wise-product-shop-more {
      float:right;
      text-decoration: none;
      font-size: 16px;
      color: white;
      background-color: var(--logo-color); /* Purple */
      padding: 8px 15px;
      border-radius: 5px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .category-wise-product-shop-more:hover {
      background-color: var(--logo-color);
    }

    .category-wise-product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 15px;
    }

    .category-wise-product-grid-item {
      text-align: center;
      background-color: white;
      border: 2px solid var(--logo-color);
      border-radius: 8px;
      overflow: hidden;
      padding: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .category-wise-product-grid-item img {
      width: 100%;
      max-width: 100%;
      height: auto;
      display: block;
    }
  </style>

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
                                    <div class="col-md-4 mb-3">
                                        <a 
                                        class="" 
                                        style="" 
                                        href="{{route('products', ['category_id'=>$category->id])}}">
                                        <img 
                                        class="" 
                                        style="
                                        border-radius:10px;
                                        
                                        " 
                                        src="{{ asset('images/category/'.$category->banner ) }}" alt="{{ $category->title }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        {{-- category Name --}}
                                        <div class="row text-dark mb-3 shadow category-wise-product-header" 
                                             style="background-color: var(--logo-color); border-radius:5px;">
                                             <div class="col-6">
                                                 <h2>{{ $category->title }}</h2>
                                             </div>
                                             <div class="col-6">
                                                    <a class="category-wise-product-shop-more" href="{{route('products', ['category_id'=>$category->id])}}">Shop More</a>
                                             </div>
                                        </div>
                                        <div class="category-wise-product-grid">
                                            @foreach($products as $product)
                                                <div class="category-wise-product-grid-item">
                                                    @include('user.partials.category_wise_product')
                                                </div>
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
