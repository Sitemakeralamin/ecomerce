
@extends('user.inc.master')

@section('title') {{ __('messages.Checkout') }} @endsection
@section('description') {{ __('messages.Checkout') }}  @endsection
@section('keywords') {{ __('messages.Checkout') }} @endsection

@section('content')
@php
    $total = Cart::subtotal();
    $discount = 0;
    if(Session::has('coupon_discount')){ 
        $discount = Session::get('coupon_discount');
    }

    $total_with_discount = $total - $discount;
@endphp

<style>
    /* HIDE RADIO */
    .hiddenradio [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    .hiddenradio [type=radio] + img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    .hiddenradio [type=radio]:checked + img {
        outline: 4px solid #0ABB75;
    }

    .attribute-bg-info{
        font-size: 1.2rem;
        border-radius: 5px;
        background-color: #F6F8FA;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
        margin-bottom:2px;
    }

</style>

<!-- Start of PageContent -->
<div class="page-content py-5">
    <div class="container">
            <div class="row mb-9">
                 {{-- Billing Info --}}
                 <div class="col-lg-8 pr-lg-4 mb-4 p-5 shadow rounded">
                    <form class="form checkout-form p-3" action="{{ route('order.create') }}" method="post">
                        @csrf
                        @if(!Auth::check())
                        <div class="">
                            <input type="hidden" name="auth_status" id="auth_status" value="0">
                            {{ __('messages.Returning customer') }}? <a href="{{ route('login') }}" style="color: #EE2761; !impotant;" class="show-login font-weight-bold text-uppercase">{{ __('messages.Login') }}</a>
                        </div>
                        @else
                            <input type="hidden" name="auth_status" id="auth_status" value="1">
                        @endif
                    <h3 class="title billing-title text-uppercase text-center text-danger ls-10 pt-2 pb-3 mb-0">
                        {{ __('messages.Billing Details') }}
                    </h3>
                    <div class="row gutter-sm">
                        {{-- Customer Name --}}
                        <div class="col-xs-6 mb-3">
                            <div class="form-group">
                                <label><strong>{{ __('messages.Name') }}</strong> @required </label>
                                <input type="text" class="checkout__input--field border-radius-5" name="name" value="{{ optional(Auth::user())->name . ' ' . optional(Auth::user())->last_name }}" placeholder="আপনার সম্পূর্ণ নাম" required>
                            </div>
                        </div>
                        {{-- Contact Number --}}
                        <div class="col-xs-6 mb-3">
                            <div class="form-group">
                                <label><strong>{{ __('messages.Phone') }}</strong> @required</label>
                                <input type="text" class="checkout__input--field border-radius-5" name="phone" value="{{ optional(Auth::user())->phone }}" placeholder="017XXXXXXXX" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5 d-none">
                            <div class="form-group">
                                <label>{{ __('messages.Email') }}({{ __('messages.Optional') }})</label>
                                <input type="email" class="checkout__input--field border-radius-5" name="email" value="{{ optional(Auth::user())->email }}">
                            </div>
                        </div>
                    </div>
                    {{-- Address --}}
                    <div class="form-group mb-3">
                        <label> <strong>{{ __('messages.Address') }}</strong> @required </label>
                        <textarea name="shipping_address" id="" cols="30" rows="10" style="height: 70px" required placeholder="{{ __('messages.House number and street name') }}" class="checkout__input--field border-radius-5 mb-2" >{{ optional(Auth::user())->address }}</textarea>
                        
                    </div>
                    <style>
                        .shipping__table--multiple {
                            width: 100% !important;
                        }

                        .shipping__table {
                            margin: 0;
                        }
                    </style>
                    <table class="shipping__table shipping__table--multiple">
                        <tbody>
                            <tr>
                                <th colspan="2">{{ __('messages.Delivery Area') }} @required</th>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr>
                                @foreach($districts as $district)                                
                                <td width="50%" class="form-group mb-3">  
                                    <input type="radio" name="district_id" value="{{ $district->id }}" class="shipping_method"> 
                                    {{ __translate($district->name, $district->bn_name) }}: 
                                    <span class="woocommerce-Price-amount amount">{{ $district->shipping_charge }}<strong>
                                        <span> TK</span></strong>
                                    </span>
                                </td>
                                @endforeach
                                @error('district_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </tr>
                            <tr>
                                @foreach($districts as $district)
                                    <td><span style="padding-left:17px;"> {{ $district->bn_name }} </span></td>
                                @endforeach
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                        </tbody>
                    </table>
                    <div class="form-group mb-3 d-none">
                        <label> {{ __('messages.Note') }}({{ __('messages.Optional') }})</label>
                        <textarea name="note" id="" cols="30" rows="10" placeholder="" class="checkout__input--field border-radius-5 mb-2" ></textarea>
                        
                    </div>
                    <div class="form-group mb-3">
                        @if (env('DELIVERY_CHARGE_ADVANCED')==true)
                            <h4><b>ক্যাশ অন ডেলিভারিতে ডেলিভারি চার্জ অগ্রিম প্রযোজ্য, ঢাকার ভিতরে ৭০ টাকা এবং ঢাকার বাহিরে ১২০ টাকা
                            </b> </h4>
                            <h4><b>বিকাশ / নগদ : 01784447632
                            </b> </h4>
                        @endif

                        <h4 class="mb-0 text-success d-none"><b>Payment Method: </b> Cash on Delivery</h4>

                        <div class="d-none">
                            <h4><b>{{ __('messages.Select a payment option') }}</b> </h4>
                            <div class="hiddenradio d-flex">
                                <label class="text-center shadow rounded p-3 mx-3">
                                  <input type="radio" name="payment_type" checked value="cod" required>
                                  <img width="100" class="rounded-pill" src="{{asset('assets/images/cod.png')}}">
                                  <br><span>{{ __('messages.Cash On Delivery') }}</span>
                                </label>
                                
                                @if(env('BKASH')==true)
                                <label class="text-center shadow rounded p-3 mx-3 ">
                                    <input type="radio" name="payment_type" value="bkash">
                                    <img width="100" class="rounded-pill" src="{{asset('assets/images/bkash-logo.png')}}">
                                    <br><span>{{ __('messages.Online Payment') }}</span>
                                 </label>
                                 @endif
                              
    
                                  @if(Auth::check() && (optional(Auth::user())->wallet_amount >= $total_with_discount))
                                    <label class="text-center shadow rounded p-3 mx-3" style="display: none;" id="wallet_select_body">
                                        <input type="radio" name="payment_type" value="wallet">
                                        <img width="100" class="rounded-pill" src="{{asset('assets/images/online-payment.jpg')}}">
                                        <br><span> {{ __('messages.Use Wallet') }} ({{optional(Auth::user())->wallet_amount}})</span>
                                    </label>
                                  @endif
    
                            </div>
                        </div>
                        
                    </div>


                    <div class="form-group mt-2 mb-3 d-none">
                        <div class="checkout__checkbox">
                            <input class="checkout__checkbox--input" id="check2" type="checkbox" checked>
                            <span class="checkout__checkbox--checkmark"></span>
                            <label class="checkout__checkbox--label" for="check2">{{ __('messages.I agree to the') }}
                                <a href="#" style="color: var(--logo-color);"> {{ __('messages.Terms and Conditions') }}, </a>
                                <a href="#" style="color: var(--logo-color);"> {{ __('messages.Return Refund Policy') }} </a> {{ __('messages.&') }}
                                <a href="#" style="color: var(--logo-color);">{{ __('messages.Privacy Policy') }}</a>

                            </label>
                        </div>
                    </div>
                    <div class="checkout__content--step__footer">{{-- d-flex align-items-center --}}
                        <button class="continue__shipping--btn primary__btn border-radius-5 col-12" type="submit"> {{ __('messages.Confirm Order') }}</button>
                        <a class="previous__link--content d-none" href="{{route('products')}}"> {{ __('messages.Return to shop') }}</a>
                    </div>

                </div>
                <div class="col-lg-4 pr-lg-4 mb-4 p-5 shadow rounded">
                    <div class="cart__summary--total mb-10">
                        <table class="cart__summary--total__table">
                            <tbody>
                                <tr class="cart__summary--total__list">
                                    <td class="cart__summary--total__title text-left fw-bold"> {{ __('messages.Subtotal') }}</td>
                                    <input type="hidden" name="subtotal" id="subtotal" value="{{$total}}" />
                                    <td class="cart__summary--amount text-right">{{ __currency().bnConv('bnComNum',$total) }}</td>
                                </tr>
                                <tr class="cart__summary--total__list">
                                    <td class="cart__summary--total__title text-left fw-bold"> {{ __('messages.Discount') }}</td>
                                    <input type="hidden" name="discount" id="discount" value="{{$discount}}" />
                                    <td class="cart__summary--amount text-right">
                                        {{ __currency().bnConv('bnComNum',$discount) }}
                                    </td>
                                </tr>
                                <tr class="cart__summary--total__list">
                                    <td class="cart__summary--total__title text-left fw-bold"> {{ __('messages.Shipping Charge') }}</td>
                                    <input type="hidden" name="shipping_charge" id="shipping_charge" value="0" />
                                    <td class="cart__summary--amount text-right"><span id="shipping_charge_label">{{ __currency().bnConv('bnComNum',0) }}</span></td>
                                </tr>

                                <tr class="cart__summary--total__list">
                                    <td class="cart__summary--total__title text-left fw-bold"> {{ __('messages.Total') }}</td>
                                    <input type="hidden" name="total" id="total" value="{{$total_with_discount}}" />
                                    <td class="cart__summary--amount text-right" id="total_show">
                                        {{ __currency().bnConv('bnComNum',$total_with_discount) }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                   
                    
                    </form>
                </div>
                {{-- Cart --}}
                <div class="col-lg-12 mb-4 sticky-sidebar-wrapper p-5">
                    <div class="order-summary-wrapper sticky-sidebar shadow rounded p-3">
                        <div class="order-summary">
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        @foreach($carts as $cart)
                                        <?php
                                            $product_info = App\Models\Product::find(optional($cart->options)->product_id);
                                        ?>
                                        @if(!is_null($product_info))
                                        <?php
                                            $variation_info = '';
                                            if($cart->weight != 0) {
                                                $stock_info = App\Models\ProductStocks::find($cart->weight);

                                                if(optional($stock_info)->sku <> null){
                                                    $sku_info = '<span class="attribute-bg-info"><b>'.__('messages.Code').':</b> '.optional($stock_info)->sku.'</span>';
                                                }else{
                                                    $sku_info = '';
                                                }

                                                if($stock_info->color <> null){
                                                    $color_attribute_info = color_info($stock_info->color);
                                                    $color_info = '<span class="attribute-bg-info"><b>'.__('messages.Color').':</b> '.optional($color_attribute_info)->name.'</span>';
                                                }
                                                else {
                                                    $color_info = '';
                                                }
                                                

                                                if($stock_info->variant <> null){
                                                    $variant_attribute_info = variation_info($stock_info->variant);
                                                    $attribute_info = '<span class="attribute-bg-info"><b>'.__translate(optional($variant_attribute_info)->title,optional($variant_attribute_info)->bn_title).': </b>'.optional($stock_info)->variant_output.'</span>';
                                                }
                                                else {
                                                    $attribute_info = '';
                                                }
                                                $variation_info = $sku_info.' '.$color_info.' '.$attribute_info;
                                            }
                                            else {
                                                $stock_info = $product_info->single_stock;
                                            }
                                        ?>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two d-flex align-items-left">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="{{route('single.product', [$product_info->id, Str::slug($product_info->title)])}}"><img class="border-radius-5 shadow rounded p-1" src="{{asset('images/product/' .optional($product_info)->thumbnail_image)}}" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">{{bnConv('bnNum',$cart->qty)}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h3">
                                                            <a href="{{route('single.product', [$product_info->id, Str::slug($product_info->title)])}}">
                                                            {{ __translate(Str::limit($product_info->title,50), Str::limit($product_info->bn_title,50)) }}
                                                        </a></h3>
                                                        {!!$variation_info!!}<br>
                                                        <span class="cart__price">{{__currency()}}{{ bnConv('bnComNum',(optional($cart->options)->single_price * $cart->qty)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="coupon__code mb-30 d-none">
                                <h3 class="coupon__code--title">{{ __('messages.Coupon') }}</h3>
                                <p class="coupon__code--desc">{{ __('messages.Enter your coupon code if you have one') }}</p>
                                <div class="coupon__code--field">
                                    <form class="coupon coupon__code--field d-flex" action="{{ route('coupon.apply') }}" method="POST">
                                        @csrf
                                        <label>
                                            <input required style="width: 200px !important;" class="coupon__code--field__input border-radius-5" name="code" placeholder="{{ __('messages.Coupon Code') }}" type="text">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn" type="submit">{{ __('messages.Apply Coupon') }}</button>

                                    </form>
                                    @if(Session::has('coupon_success'))
                                    <p class="alert alert-success">{{ Session::get('coupon_success') }} </p>
                                    @endif

                                    @if(Session::has('invalid'))
                                        <p class="alert alert-danger">{{ Session::get('invalid') }}</p>
                                    @endif
                                    @if(Session::has('coupon_discount'))
                                        <a href="{{ route('coupon.remove') }}" class="btn btn-dark btn-outline btn-rounded">{{ __('messages.Remove Coupon') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

            </div>
    </div>
</div>
<!-- End of PageContent -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.shipping_method').change(function(){
        var district_id = $(this).val();
        if (district_id == ''){
            district_id = -1;
        }
        var option = "<option value=''>{{ __('messages.Please Chose Your Shipping Area') }}</option>";
        var url = "{{ url('/') }}";

        $.get( url + "/get-area/"+district_id, function( data ) {
            data = JSON.parse(data);
            data.forEach(function (element) {
                option += "<option value='"+ element.id +"'>"+ element.name + "</option>";
            });
            //console.log(option);
            $('#areas').html(option);
        });

        var subtotal = $('#subtotal').val();
        let discount = $('#discount').val();
        let total = 0;
        let wallet_amount = 0;
        let auth_status = $('#auth_status').val();

        $.ajax({
            url: url+"/get-shipping-charge",
            type: "get",
            data:{
                district_id:district_id,
                subtotal:subtotal,
                discount:discount,
            },
            success:function(response){
            total = (parseInt(subtotal) - parseInt(discount)) + parseInt(response.shipping_charge_amount);
            wallet_amount = response.wallet_amount;

            if(auth_status == 1 && parseFloat(wallet_amount) >= parseFloat(total)) {
                $('#wallet_select_body').show();
            }
 
            $('#shipping_charge_label').html(response.shipping_charge);

            $('#total_show').html(response.total_show);
            $('#total').val(response.total_amount);
            $('#shipping_charge').val(response.shipping_charge_amount);
            }
        });

    });

    function calculate_total() {

    }

    function payment_setup(type) {
        if(type == 'cod') {
            $('#online_mfs_main_div').hide();
            $('#online_payment_mfs').prop('required', false);
            $('#online_mfs_paymnet_number').prop('required', false);
        }
        else if (type == 'online_mfs') {
            $('#online_mfs_main_div').show();
            $('#online_payment_mfs').prop('required', true);
            $('#online_mfs_paymnet_number').prop('required', true);
        }
    }
</script>

@endsection
