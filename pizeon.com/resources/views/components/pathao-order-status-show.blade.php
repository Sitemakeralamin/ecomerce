<div>
    <?php
        use Codeboxr\PathaoCourier\Facade\PathaoCourier;
        $queryStatus = PathaoCourier::order()->orderDetails($orderid);
    ?>

    <div class="shadow border rounded p-2">
        <h3><b>Pathao  Courier Order Details</b></h3>
        <div class="row">
            <div class="col-md-12">
                <p><strong>Order ID:</strong> {{ $queryStatus->order_id }}</p>
                <p><strong>Merchant Order ID:</strong> {{ $queryStatus->merchant_order_id }}</p>
                <p><strong>Recipient Name:</strong> {{ $queryStatus->recipient_name }}</p>
                <p style="line-height: 1.5 !important;"><strong>Recipient Address:</strong> {{ $queryStatus->recipient_address }}</p>
                <p><strong>Recipient Phone:</strong> {{ $queryStatus->recipient_phone }}</p>
                <p><strong>City:</strong> {{ $queryStatus->city_name }}</p>
                <p><strong>Zone:</strong> {{ $queryStatus->zone_name }}</p>
                <p><strong>Area:</strong> {{ $queryStatus->area_name }}</p>
                <p><strong>Order Amount:</strong> {{ $queryStatus->order_amount }}</p>
                <p><strong>Total Fee:</strong> {{ $queryStatus->total_fee }}</p>
                <p class="text-light bg-success p-2 rounded"><strong>Quorier Status:</strong> {{ $queryStatus->order_status }}</p>
                <p><strong>Delivery Type:</strong> {{ $queryStatus->delivery_type }}</p>
                <p><strong>Delivery Fee:</strong> {{ $queryStatus->delivery_fee }}</p>
                <p><strong>Total Weight:</strong> {{ $queryStatus->total_weight }}</p>
                <p><strong>Cash on Delivery:</strong> {{ $queryStatus->cash_on_delivery }}</p>
                <p><strong>Color:</strong> {{ $queryStatus->color }}</p>
                <p><strong>Billing Status:</strong> {{ $queryStatus->billing_status }}</p>
                <p><strong>Order Created At:</strong> {{ date("d M, Y h:s:i A", strtotime($queryStatus->order_created_at)) }}</p>
                <p><strong>Store Name:</strong> {{ $queryStatus->store_name }}</p>
                <p><strong>Order Type:</strong> {{ $queryStatus->order_type }}</p>
            </div>
        </div>
    </div>
</div>