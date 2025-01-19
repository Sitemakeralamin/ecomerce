@if(!empty($product))
@php
    //$stock_price = $product->single_stock;
    $stock_price = DB::table('product_stocks')->where('product_id', $product->id)->where('variant', '=', null)->where('color', '=', null)->first(['price', 'qty']);
    $sale_text = __('messages.New');

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

<div class="col">
    <div class="product__items product_col rounded">
        <div class="product__items--thumbnail">
            <a class="product__items--link" href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                <img class="product__items--img product__primary--img" src="{{ asset('images/product/'.$product->thumbnail_image) }}" alt="{{$product->title}}">
            </a>
        </div>
    </div>
</div>

@endif
