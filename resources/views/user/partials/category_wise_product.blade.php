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

<div class="col mb-30">
    <div class="product__items product_col rounded" style="border: 1px solid var(--logo-color)">
        <div class="product__items--thumbnail">
            <a class="product__items--link" href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                <img class="product__items--img product__primary--img product_img" src="{{ asset('images/product/'.$product->thumbnail_image) }}" alt="{{$product->title}}">
            </a>
            
        </div>
        <div class="product__items--content text-center mb-4" style="padding-top: 0px !important;">
            <h4 class="product__items--content__title d-none" style="min-height:0px !important;">
                <a href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                {{ __translate(Str::limit($product->title,20), Str::limit($product->bn_title,20)) }}
            </a></h4>
            <div class="product__items--price" style="margin-bottom: 0px !important;">
                    
                    @if($product->discount_type <> 'no')
                    <?php
                        $old_price = 0;
                        if($product->discount_type == 'flat') {
                            $old_price = optional($stock_price)->price - optional($product)->discount_amount;
                        }
                        else if($product->discount_type == 'percentage') {
                            $discount_amount_tk = (optional($product)->discount_amount * optional($stock_price)->price)/100;
                            $old_price =  optional($stock_price)->price - $discount_amount_tk;
                        }

                    ?>
                    <span class="old__price text-danger">
                        {{ optional($stock_price)->price?bnConv('bnComNum',optional($stock_price)->price):0 }}
                    </span>
                    <span class="price__divided"></span>
                    <span class="current__price">{{ bnConv('bnComNum',$old_price) }}</span>
                @else
                    <span class="current__price">
                        {{ optional($stock_price)->price?__currency().bnConv('bnComNum',optional($stock_price)->price):0 }}
                    </span>
                @endif
            </div>
            <ul class="product__items--action">
                <li class="product__items--action__list text-center">
                        @if(optional($stock_price)->qty > 0)
                            <a class="product__items--action__btn add__to--cart" 
                            style="
                                height: 2.7rem;
                                line-height: 2.5rem;
                                background-color: var(--logo-color); 
                                color:white;
                            "  {{--onclick="quick_view({{ $product->id }})"--}} href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                            <span class="add__to--cart__text">{{ __('messages.Order Now') }}</span>
                            </a>
                        @else
                            {{-- Out of Stock --}}
                            <a class="product__items--action__btn add__to--cart" 
                            style="
                                height: 2.5rem;
                                line-height: 2.5rem;
                            color:red" href="javascript:void(0)">
                            <span class="add__to--cart__text">{{ __('messages.Out of Stock') }}</span>
                            </a>
                        @endif
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
