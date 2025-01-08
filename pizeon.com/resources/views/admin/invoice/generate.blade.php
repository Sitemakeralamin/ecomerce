@php
  $business = App\Models\Setting::find(1);
@endphp
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title></title>

<style>


      li{
        list-style: none;
        float: left;
        overflow: hidden;
      }
    p{
        font-size: 13px;
    }
    .customar_info{
        width: 100%;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid black;
      text-align: left;
      padding: 5px;
      font-size: 13px;
    }
    .invoiceIDandDate{
        text-align: right;

    }
    .clientInfo{
        background-color: red;
    }

</style>
</head>
<body>
    <div>
      <div>
        <img src="{{ asset('images/website/'.optional($business)->footer_logo.'') }}" height="60">

        {{-- <img src="{{ asset('images/website/'.$business->logo) }}"> --}}
      </div>
        <table>
          <tr>
            <th style="border: 0px solid white;">
                    <div>
                        <p>
                          <strong>Bill To,</strong> <br>
                            <strong>Name:</strong> {{ $order->name }}<br>
                              <strong>Phone:</strong> {{ $order->phone }}<br>
                           @if ($order->email) </strong>Email:</strong> {{ $order->email }}<br> @endif
                           <strong>Shipping Address:</strong> {{ $order->shipping_address }}<br>
                          </p>
                          </div>
                        </th>
            <th style="text-align: right; border: 0px solid white;">
                <p class="invoiceIDandDate" style="font-family: Arial;">Invoice # {{ $order->code }}<br>Date: {{\Carbon\Carbon::parse($order->created_at)->format('d M, Y')}}</p>
            </th>
          </tr>
        </table>
  </div>
  <br/>

  <div>
    <table class="table table-bordered">
                      <thead class="thead-light">
                        <tr style="text-align: right; background-color: #dddddd;">
                              <th scope="col" style="text-align: center;">S.N</th>
                              <th width="50px" style="text-align: left;">Product Name</th>
                              <th scope="col" style="text-align: center;">Quantity</th>
                              <th scope="col" style="text-align: right;">Price</th>
                              <th scope="col" style="text-align: right;"> Total</th>
                            </tr>
                      </thead>
                      <tbody>
                        @foreach($order->order_product as $product)
                        <?php
                            $variation_info = '';
                            if($product->variations <> 0) {
                                $stock_info = variation_stock_info($product->variations);
                                if(!is_null($stock_info)) {

                                    if($stock_info->sku <> null){
                                        $product_code = '<b>Code: </b>'.optional($stock_info)->sku.', ';
                                    }
                                    else {
                                        $product_code = '';
                                    }
                                    if($stock_info->color <> null){
                                        $color_attribute_info = color_info($stock_info->color);
                                        $color_info = '<b>Color: </b>'.optional($color_attribute_info)->name.', ';
                                    }
                                    else {
                                        $color_info = '';
                                    }

                                    if($stock_info->variant <> null){
                                        $variant_attribute_info = variation_info($stock_info->variant);
                                        $attribute_info = '<b>'.optional($variant_attribute_info)->title.': </b>'.optional($stock_info)->variant_output.'';
                                    }
                                    else {
                                        $attribute_info = '';
                                    }
                                    $variation_info = $product_code.$color_info.$attribute_info;
                                }
                            }

                        ?>
                        <tr style="text-align: right;">
                          <th scope="row" style="text-align: center;">{{ $loop->index + 1 }}</th>
                          <td width="350px" style="text-align: left;">{{ $product->product->title??'N/A' }}<br><span class="cart__content--variant">{!!$variation_info!!}</span>
                          </td>
                          <td style="text-align: center;">{{ $product->qty??0 }}</td>
                          <td style="text-align: right;">{{ env('CURRENCY') }}{{ $product->price??0 }}</td>
                          <td style="text-align: right;"><span>{{ env('CURRENCY') }}{{ $product->price * $product->qty }}</span>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
               </div>
           </div>
           <div style="margin-top: 8px; text-align: right;">
           <table>
                          <tbody style="text-align: right;">
                              <tr style="text-align: right;">
                                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Sub Total</b></td>
                                    <td style="text-align: right;">{{ env('CURRENCY') }}{{ $order->price??0 }}</td>
                              </tr>

                              @if(optional($order)->coupon_discount_amount > 0)
                              <tr style="text-align: right;">
                                <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;">
                                  <b>Discount</b>(-)
                                </td>
                                    <td style="text-align: right;">
                                      {{ env('CURRENCY') }}{{  $order->coupon_discount_amount??0 }}
                                  </td>
                              </tr>
                            @endif

                              <tr style="text-align: right;">
                                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Delivery Charge</b>(+)</td>
                                    <td style="text-align: right;">{{ env('CURRENCY') }}{{ $order->delivery_charge??0 }}</td>
                              </tr>



                              <tr style="text-align: right;">
                                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Total</b></td>
                                    <td style="text-align: right;">{{ env('CURRENCY') }}{{ optional($order)->price - optional($order)->coupon_discount_amount + optional($order)->delivery_charge }}</td>
                              </tr>

                         </tbody>
                        </table>
  </div>


              <p><b>Payment Method:</b>&nbsp;&nbsp; {{ $order->payment_method }}</p>                <div>

    </div>

  </body>
</html>
