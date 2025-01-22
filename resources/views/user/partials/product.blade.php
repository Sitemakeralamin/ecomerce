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

<div class="col mb-30 py-3 rounded product_col">
    <div class="product__items" style="">
        <div class="product__items--thumbnail">
            <a class="product__items--link" 
                href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                <img class="product__items--img product__primary--img product_img border-radius-10" src="{{ asset('images/product/'.$product->thumbnail_image) }}" alt="{{$product->title}}">
            </a>
            <div class="product__badge">
                <span class="product__badge--items sale">{{$sale_text}}</span>
            </div>
        </div>

        <div class="product__items--content text-center">
            <h4 class="product__items--content__title"><a href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                {{ __translate(Str::limit($product->title,50), Str::limit($product->bn_title,50)) }}
            </a></h4>
            <div class="product__items--price">
                <span class="current__price">
                    {{ __currency().bnConv('bnComNum',optional($stock_price)->price) }}
                </span>
                    @if($product->discount_type <> 'no')
                    <?php
                        if($product->discount_type == 'flat') {
                            $old_price = optional($stock_price)->price + optional($product)->discount_amount;
                        }
                        else if($product->discount_type == 'percentage') {
                            $discount_amount_tk = (optional($product)->discount_amount * optional($stock_price)->price)/100;
                            $old_price =  optional($stock_price)->price + $discount_amount_tk;
                        }

                    ?>
                    <span class="price__divided"></span>
                    <span class="old__price">{{ __currency().bnConv('bnComNum',$old_price) }}</span>
                @endif
            </div>


            <ul class="product__items--action">
                <li class="product__items--action__list text-center">
                    @if($product->type == 'single')
                        @if(optional($stock_price)->qty > 0)

                            {{-- Buy Now --}}
                            <button class="product__items--action__btn buy__now--cart bg-buy-now" onclick="addToCart({{ $product->id }}, 'only', 'checkout')" type="button">
                                {{ __('messages.Buy Now') }}
                            </button>

                            {{-- Add to cart --}}
                            <button class="product__items--action__btn add__to--cart bg-add-to-cart d-none" onclick="addToCart({{ $product->id }}, 'only', 'cart')" type="button" >
                          {{ __('messages.Add To Cart') }}
                            </button>
                            
                        @else
                            {{-- Out of Stock --}}
                            <a class="product__items--action__btn add__to--cart" style="background-color: var(--logo-color);color:white" href="javascript:void(0)">
                            <span class="add__to--cart__text">{{ __('messages.Out of Stock') }}</span>
                            </a>
                        @endif
                    @else
                    {{-- Select Product --}}
                        <a class="product__items--action__btn add__to--cart" style="background-color: var(--logo-color);color:white"  {{--onclick="quick_view({{ $product->id }})"--}} href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                            <span class="add__to--cart__text">{{ __('messages.Order Now') }}</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
