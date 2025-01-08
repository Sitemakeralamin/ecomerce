@extends('admin.layouts.master')
@section('content')
@php
  $business_info = DB::table('settings')->first();
  $courierInfo = DB::table('delivery_courier_infos')->orderBy('id', 'desc')->where('order_code', optional($order)->code)->first();
  $itemDescriptions = [];
  $itemQuantity = 0;
  $itemWeight = 0;
@endphp

<style>
  p {
    line-height: .8 !important;
  }
</style>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="mb-0 fw-bold">Order Information</h1>
      </div>
      <div class="col-md-6 text-end">
        <a href="{{ route('order.invoice.generate', optional($order)->id) }}" class="btn btn-primary float-right" target="_blank"><i class="fas fa-download"></i> Print Invoice</a>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h4>
                  <img class="bg-dark p-2 rounded shadow" src="{{ asset('images/website/'.optional($business_info)->header_logo.'') }}" width="100" alt="Company Logo">
                </h4>
                <address>
                  <strong>Name:</strong> {{ optional($order)->name }}<br>
                  <strong>Phone:</strong> {{ optional($order)->phone }}<br>
                  @if ($order->email) <strong>Email:</strong> {{ optional($order)->email }}<br> @endif
                  @if ($order->city) <strong>City:</strong> {{ optional($order)->city }}<br> @endif
                  <strong>Shipping Address:</strong> {{ optional($order)->shipping_address }}
                </address>
              </div>
              <div class="col-md-6 text-right">
                <address>
                  <strong>Date:</strong> {{ \Carbon\Carbon::parse(optional($order)->created_at)->format('d M, Y g:iA') }}<br>
                  <strong>Order Code:</strong> #{{ optional($order)->code }}<br>
                  <strong>Payment Status:</strong> <span class="badge badge-{{ optional($order)->payment_status == 'paid' ? 'success' : 'danger' }}">{{ optional($order)->payment_status == 'paid' ? 'Paid' : 'Not Paid' }}</span><br>
                  <strong>Payment Method:</strong> {{ optional($order)->payment_method }}<br>
                  @if(optional($order)->payment_method == 'Manual MFS')
                    <strong>Received By:</strong> {{ optional(optional($order))->manual_mfs_account_name }}<br>
                    <strong>Payment Number:</strong> {{ optional(optional($order))->manual_mfs_payment_number }}<br>
                    <strong>Transaction ID:</strong> {{ optional(optional($order))->manual_mfs_transaction_id }}<br>
                  @endif
                  @if(optional($order)->payment_method == 'online payment' && optional($order)->order_transaction_info <> '')
                    <span class="text-success fw-bold">
                      <strong>Transaction ID:</strong> {{ optional($order)->order_transaction_info->tran_id }}<br>
                      <strong>Amount:</strong> {{ env('CURRENCY') }} {{ optional($order)->order_transaction_info->amount }}<br>
                      <strong>Store Amount:</strong> {{ env('CURRENCY') }} {{ optional($order)->order_transaction_info->store_amount }}<br>
                    </span>
                  @endif
                  <span class="h4"><strong>Status:</strong> <span class="badge badge-primary">{{ optional($order)->order_status }}</span></span><br>
                </address>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(optional($order)->order_product as $product)
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

                          $itemDescription = [
                              'title' => $product->product->title,
                              'variation_info' => $variation_info,
                              'price' => $product->price,
                              'quantity' => $product->qty,
                              'total_price' => $product->price * $product->qty,
                          ];

                          $itemDescriptions[] = $itemDescription;

                          $itemQuantity += $product->qty;
                          $itemWeight += ($product->product->weight ?? 0) * $product->qty;
                      ?>
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $product->product->title }}<br><span class="cart__content--variant">{!! $variation_info !!}</span></td>
                        <td>{{ env('CURRENCY') }}{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ env('CURRENCY') }}{{ $product->price * $product->qty }}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <td colspan="4" align="right">Subtotal:</td>
                      <td>{{ env('CURRENCY') }}{{ $order->price??0 }}</td>
                    </tr>
                    @if(optional($order)->coupon_discount_amount > 0)
                      <tr>
                        <td colspan="4" align="right">Discount:</td>
                        <td>{{ env('CURRENCY') }}{{ $order->coupon_discount_amount??0 }}</td>
                      </tr>
                    @endif
                    <tr>
                      <td colspan="4" align="right">Delivery Charge:</td>
                      @if(optional($order)->payment_method == 'cash on delivery')
                      <td>{{ env('CURRENCY') }}{{ $order->delivery_charge??0}}</td>
                      @endif
                    </tr>
                    <tr>
                      <td colspan="4" align="right">Total:</td>
                      <td>{{ env('CURRENCY') }}{{ optional($order)->price - optional($order)->coupon_discount_amount + optional($order)->delivery_charge }} </td> 
                    </tr>
                  </tbody>
                </table>
                <p><strong>Order note:</strong> {{ optional($order)->note }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('order.payment.status.change', optional($order)->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Payment Status</label>
                <select name="payment_status" class="form-control">
                  <option value="paid" {{ optional($order)->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                  <option value="unpaid" {{ optional($order)->payment_status == 'unpaid' ? 'selected' : '' }}>Not Paid</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
            <form action="{{ route('order.status.change', optional($order)->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Order Status</label>
                <select name="order_status_id" class="form-control">
                  <option @if(optional($order)->order_status == 'pending') selected @endif value="pending">Pending</option>
                  <option @if(optional($order)->order_status == 'processing') selected @endif value="processing">Processing</option>
                  <option @if(optional($order)->order_status == 'shipped') selected @endif value="shipped">Shipped</option>
                  <option @if(optional($order)->order_status == 'delivered') selected @endif value="delivered">Delivered</option>
                  <option @if(optional($order)->order_status == 'canceled') selected @endif value="canceled">Canceled</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>

      <div class="col-md-12 mb-5">
        <div class="shadow rounded bg-light border card-body">
          <h5 class="text-bold">Courier Info</h5>
          @if(!is_null($courierInfo))
            <div class="row">
             
              <div class="col-md-6">
                @if($courierInfo->courier_type == 'pathao')

                  <x-pathao-order-status-show :orderid="$courierInfo->consignment_id" />

                @endif
              </div>
              <div class="col-md-6">
                <div class="shadow border rounded p-2">
                  <p><strong>Courier Type:</strong> {{ $courierInfo->courier_type }}</p>
                  <p><strong>Order Code:</strong> {{ $courierInfo->order_code }}</p>
                  <p><strong>Consignment ID:</strong> {{ $courierInfo->consignment_id }}</p>
                  <p><strong>Delivery Fee:</strong> {{ $courierInfo->delivery_fee }}</p>
                  <p><strong>Merchant Order ID:</strong> {{ $courierInfo->merchant_order_id }}</p>
                  <p><strong>Recipient Name:</strong> {{ $courierInfo->recipient_name }}</p>
                  <p><strong>Recipient Phone:</strong> {{ $courierInfo->recipient_phone }}</p>
                  <p style="line-height: 1.5 !important;"><strong>Recipient Address:</strong> {{ $courierInfo->recipient_address }}</p>
                  <p><strong>City Text:</strong> {{ $courierInfo->city_text }}</p>
                  <p><strong>Zone Text:</strong> {{ $courierInfo->zone_text }}</p>
                  <p><strong>Area Text:</strong> {{ $courierInfo->area_text }}</p>
                  <p><strong>Recipient Zone:</strong> {{ $courierInfo->recipient_zone }}</p>
                  <p><strong>Recipient Area:</strong> {{ $courierInfo->recipient_area }}</p>
                  <p><strong>Delivery Type:</strong> {{ $courierInfo->delivery_type }}</p>
                  <p><strong>Item Type:</strong> {{ $courierInfo->item_type }}</p>
                  <p><strong>Special Instruction:</strong> {{ $courierInfo->special_instruction }}</p>
                  <p><strong>Item Quantity:</strong> {{ $courierInfo->item_quantity }}</p>
                  <p><strong>Item Weight:</strong> {{ $courierInfo->item_weight }}</p>
                  <p><strong>Amount to Collect:</strong> {{ $courierInfo->amount_to_collect }}</p>
                  <p><strong>Item Description:</strong> {{ $courierInfo->item_description }}</p>
                  <p><strong>Admin Note:</strong> {{ $courierInfo->admin_note }}</p>

                </div>
            </div>
            
          </div>
        


          @else
            <div class="container">
              <form action="{{route('order.delivery.query.store')}}" method="post">
                @csrf
                  <div class="mb-3">
                      <label for="courier_type" class="form-label"><span class="text-danger">*</span>Courier Type:</label>
                      <select class="form-select form-control" required onchange="changeCourierType()" id="courier_type" name="courier_type">
                          <option value="">-- Select Courier Type --</option>
                          <option value="pathao">Pathao</option>
                          {{-- <option disabled value="redx">RedX</option> --}}
                          <option value="ecourier">ECourier</option>
                      </select>
                  </div>

                  <input type="hidden" name="city_text" id="city_text" value="">
                  <input type="hidden" name="zone_text" id="zone_text" value="">
                  <input type="hidden" name="area_text" id="area_text" value="">

                  <div id="cityZoneAreaBody"></div>
                
                  <input type="hidden" class="form-control" id="order_code" name="order_code" value="{{optional($order)->code}}">
                  <input type="hidden" class="form-control" id="merchant_order_id" name="merchant_order_id" value="{{optional($order)->code}}">
                  <input type="hidden" class="form-control" id="item_description" name="item_description" value="{{json_encode($itemDescriptions)}}">

                  <div class="mb-3">
                      <h5>Recipient Information</h3>

                        <div class="row">
                          <div class="col-md-6 mb-2">
                            <label for="recipient_name" class="form-label">Recipient Name:</label>
                            <input type="text" class="form-control" required id="recipient_name" value="{{ optional($order)->name }}" name="recipient_name">
                          </div>
                          <div class="col-md-6 mb-2">
                            <label for="recipient_phone" class="form-label">Recipient Phone:</label>
                            <input type="text" class="form-control" value="{{ optional($order)->phone }}" required id="recipient_phone" name="recipient_phone">
                          </div>
                          <div class="col-md-12 mb-2">
                            <label for="recipient_address" class="form-label">Recipient Address:</label>
                            <input type="text" class="form-control" minlength="10" required id="recipient_address" value="{{ optional($order)->shipping_address }}" name="recipient_address">
                          </div>
                        </div>
                      
                  </div>
          
                  <!-- Delivery Type -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                          <label for="delivery_type" class="form-label">Delivery Type:</label>
                          <select class="form-control form-select" id="delivery_type" name="delivery_type">
                              <option value="48">Normal Delivery [48 Hours]</option>
                              <option value="12">On Demand Delivery [12 Hours]</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                          <label for="item_type" class="form-label">Item Type:</label>
                          <select class="form-control form-select" id="item_type" name="item_type">
                              <option value="2">Parcel</option>
                              <option value="1">Document</option>
                          </select>
                      </div>
                    </div>
                  </div>

                  
                  <div class="mb-3">
                      <label for="special_instruction" class="form-label">Special Instruction:</label>
                      <input type="text" class="form-control" id="special_instruction" name="special_instruction">
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                          <label for="item_quantity" class="form-label">Item Quantity:</label>
                          <input type="number" class="form-control" id="item_quantity" name="item_quantity" required value="{{$itemQuantity}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                          <label for="item_weight" class="form-label">Item Weight:</label>
                          <input type="number" class="form-control" id="item_weight" required name="item_weight" value="{{$itemWeight}}" step="0.01">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                          <label for="amount_to_collect" class="form-label">Amount to Collect:</label>
                          <input type="number" step=any class="form-control" value="{{ optional($order)->price + optional($order)->delivery_charge }}" id="amount_to_collect" name="amount_to_collect" step="0.01">
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        


          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function changeCourierType() {
    let courierType = $('#courier_type').val();
    
    $.ajax({
          type: 'get',
          url: "{{route('order.getZoneInfoFromCourierType')}}",
          data: {
              'courierType': courierType,
          },
          beforeSend: function() {
              $('#cityZoneAreaBody').html('<div class="text-center col-md-12"><div class="spinner-border text-dark mb-5" role="status"><span class="sr-only">Loading...</span></div></div>');
          },
          success: function (data) {
              $('#cityZoneAreaBody').html(data);
          }
      });
  }
</script>

@endsection
