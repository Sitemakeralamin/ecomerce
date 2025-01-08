@if(!empty($product))
@php
    //$stock_price = $product->single_stock;
    $stock_price = DB::table('product_stocks')->where('product_id', $product->id)->where('variant', '=', null)->where('color', '=', null)->first(['price', 'qty']);
    $sale_text = __('messages.sale');

    if($product->discount_type <> 'no') {
        if($product->discount_type == 'flat' && optional($product)->discount_amount>0) {
            $sale_text = '- '.__currency().bnConv('bnComNum',optional($product)->discount_amount);
        }
        else if($product->discount_type == 'percentage' && optional($product)->discount_amount>0) {
            $sale_text = '- '.bnConv('bnComNum',optional($product)->discount_amount)."%";
        }
    }

    if($product->type == 'single' && optional($stock_price)->qty <= 0) {
        $sale_text = __('messages.Out of Stock');
    }
    else {
        $stock_price = DB::table('product_stocks')->where('product_id', $product->id)->first(['price', 'qty']);

        //$variations = $product->variation_stock;
        //$min_price = $variations->min('price');
        //$max_price = $variations->max('price');
    }

@endphp

<div class="col mb-30 py-3 rounded product_col">
    <div class="product__items">
        <div class="product__items--thumbnail">
            <a class="product__items--link" href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                <img class="product__items--img product__primary--img product_img border-radius-10" src="{{ asset('images/product/'.$product->thumbnail_image) }}" alt="{{$product->title}}">
            </a>
        </div>

        <div class="product__items--content text-center">
            <h4 class="product__items--content__title"><a href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                {{ __translate(Str::limit($product->title,50), Str::limit($product->bn_title,50)) }}
            </a></h4>
            <ul class="product__items--action">
                <li class="product__items--action__list">
                            {{-- Get Quote --}}
                            <button class="product__items--action__btn add__to--cart bg-buy-now rounded-pill open-modal-btn"
                            onclick="getId({{ $product->id }})"  
                            >
                            <span class="add__to--cart__text ps-5  pe-5"> {{ __('messages.Get Quote') }}</span>
                        </button>
                       
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
