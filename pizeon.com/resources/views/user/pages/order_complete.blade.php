
@extends('user.inc.master')
@section('title')Order Info @endsection
@section('description')Order Info  @endsection
@section('keywords')Order Info @endsection
@section('content')
<style>
    @media only screen and (min-width: 768px) { 
        #text_end_on_desktop {
            text-align: right !important;
        }
    }
</style>

<section class="my__account--section py-5" id="printArea">
    <div class="container">
        <div class="my__account--section__inner p-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account__wrapper account__wrapper--style4 border-radius-10">
                        <div class="account__content">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <h2 class="account__content--title h3 mb-20">{{ __('messages.Orders Info') }}</h2>
                                </div>
                                <div class="col-md-6 col-4"></div>
                                <div class="col-md-2 col-4">
                                    <a href="{{ route('order.invoice.generate', $order->id) }}" 
                                        class="btn btn-outline-primary btn-lg float-right" style="margin-right: 5px;" target="blank">
                                        
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                        Print Invoice</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 mb-3">
                                    <div class="cart__summary border-radius-10 mt-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="">
                                                    <p>{{ __('messages.Bill To') }},<br>
                                                        <b>{{ __('messages.Name') }}:</b> {{optional($order)->name}} <br>
                                                        <b>{{ __('messages.Phone') }}:</b> {{optional($order)->phone}} <br>
                                                        <b>{{ __('messages.Email') }}:</b> {{optional($order)->email}}<br>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="text_end_on_desktop">
                                                <p>
                                                    <b>{{ __('messages.Order Code') }}:</b> {{optional($order)->code}} <br>
                                                    <b>{{ __('messages.Date') }}:</b> {{date("d M, Y", strtotime(optional($order)->created_at))}} <br>
                                                    <span class="text-info"><b>{{ __('messages.Status') }}:</b> {{optional($order)->order_status}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="table-responsive rounded p-4 ">
                                            <table class="cart__table--inner">
                                                <thead class="cart__table--header">
                                                    <tr class="cart__table--header__items">
                                                        <th width="45%" class="cart__table--header__list">{{ __('messages.Product') }}</th>
                                                        <th class="cart__table--header__list">{{ __('messages.Price') }}</th>
                                                        <th class="cart__table--header__list">{{ __('messages.Quantity') }}</th>
                                                        <th class="cart__table--header__list">{{ __('messages.Total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="cart__table--body">
                                                    @if(count($order->order_product) > 0)
                                                    @foreach($order->order_product as $product)
                                                    @php
                                                        $variation_info = '';
                                                        if($product->variations <> 0) {
                                                            $stock_info = variation_stock_info($product->variations);
                                                            if(!is_null($stock_info)) {

                                                                if(optional($stock_info)->sku <> null){
                                                                    $sku_info = '<b>'.__('messages.Code').': </b>'.optional($stock_info)->sku.', <br>';
                                                                }else{
                                                                    $sku_info = '';
                                                                }

                                                                if($stock_info->color <> null){
                                                                    $color_attribute_info = color_info($stock_info->color);
                                                                    $color_info = '<b>'.__('messages.Color').': </b>'.optional($color_attribute_info)->name.', ';
                                                                }
                                                                else {
                                                                    $color_info = '';
                                                                }
            
                                                                if($stock_info->variant <> null){
                                                                    $variant_attribute_info = variation_info($stock_info->variant);
                                                                    $attribute_info = '<b>'.__translate(optional($variant_attribute_info)->title, optional($variant_attribute_info)->bn_title).': </b>'.optional($stock_info)->variant_output.'';
                                                                }
                                                                else {
                                                                    $attribute_info = '';
                                                                }
                                                                $variation_info = $sku_info.$color_info.$attribute_info;
                                                            }
                                                        }
                                                    @endphp
                                                    
                                                    <tr class="cart__table--body__items mb-2">
                                                        <td class="cart__table--body__list">
                                                            <div class="cart__product d-flex align-items-center">
                                                                <button class="cart__remove--btn" aria-label="search button" type="submit">{{($loop->index) + 1}}</button>
                                                                <div class="cart__thumbnail">
                                                                    <a href="#"><img class="border-radius-5 shadow rounded p-1" src="{{ asset('images/product/'.optional($product->product)->thumbnail_image) }}" alt="cart-product"></a>
                                                                </div>
                                                                <div class="cart__content">
                                                                    <h4 class="cart__content--title"><a href="#">
                                                                        {{__translate(Str::limit(optional($product->product)->title,50),Str::limit(optional($product->product)->bn_title,50))}}</a></h4>
                                                                    <span class="cart__content--variant">{!!$variation_info!!}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price"><span class="current__price">
                                                                {{  __currency().bnConv('bnComNum',optional($product)->price) }}
                                                            </span></span>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            {{optional($product)->qty}} {{ optional($product->product)->unit_type }}
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price end">
                                                                {{  __currency().bnConv('bnComNum',optional($product)->total) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                    @endif                                                                                                             
                                                 </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="cart__summary border-radius-10 mt-0" >
                                        <div class="cart__summary--total mb-20">
                                            <table class="cart__summary--total__table">
                                                <tbody>
                                                    <tr class="cart__summary--total__list">
                                                        <td class="cart__summary--total__title text-left">{{__('messages.Subtotal')}}</td>
                                                        <td class="cart__summary--amount text-right">
                                                            {{  __currency().bnConv('bnComNum',optional($order)->price) }}
                                                            
                                                        </td>
                                                    </tr>
                                                    @if($order->coupon_discount_amount > 0)
                                                    <tr class="cart__summary--total__list">
                                                        <td class="cart__summary--total__title text-left">
                                                            {{__('messages.Discount')}}
                                                        </td>
                                                        <td class="cart__summary--amount text-right">
                                                            {{  __currency().bnConv('bnComNum',optional($order)->coupon_discount_amount) }}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr class="cart__summary--total__list">
                                                        <td class="cart__summary--total__title text-left"> {{__('messages.Shipping Charge')}}
                                                            @if (env('DELIVERY_CHARGE_ADVANCED') == true) 
                                                            (<span class="text-success">{{__('messages.Advanced')}}</span>) 
                                                                @endif
                                                                 </td>
                                                        <td class="cart__summary--amount text-right">
                                                            {{  __currency().bnConv('bnComNum',optional($order)->delivery_charge) }}
                                                        </td>
                                                    </tr>
                                                    <tr class="cart__summary--total__list">
                                                        <td class="cart__summary--total__title text-left">{{__('messages.Total')}}</td>
                                                        <td class="cart__summary--amount text-right">
                                                            {{  __currency().bnConv('bnComNum',optional($order)->total_payable) }}
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div> 
                                </div>
                                <div class="col-lg-8 mb-3">
                                    <div class="cart__summary border-radius-10 mt-0">
                                        <p>
                                            <b>{{__('messages.Shipping area')}}:</b> 
                                            {{ __('messages.'.optional($order->district_info)->name) }}<br>
                                            <b>{{__('messages.Shipping Address')}}:</b> {{ optional($order)->shipping_address }}<br>
                                            <b>{{__('messages.Note')}}:</b> {{optional($order)->note}}
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function printSpecialArea() {
        $('#printButton').hide();
        var printContent = document.getElementById("printArea").innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        $('#printButton').show();
    }
</script>
@endsection