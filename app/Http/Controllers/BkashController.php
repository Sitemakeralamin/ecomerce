<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use URL;
use Cart;
use App\Models\Product;
use App\Models\ProductStocks;
use Illuminate\Support\Str;
use App\Models\Order;

class BkashController extends Controller
{
    private $base_url;

    public function __construct()
    {
        env('SANDBOX') ? $this->base_url = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta' : $this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
        // $this->base_url = env('BKASH_BASE_URL');
        
    }

    public function authHeaders(){
        return array(
            'Content-Type:application/json',
            'Authorization:' .$this->grant(),
            'X-APP-Key:'. env('BKASH_APP_KEY'),
        );
    }
         
    public function curlWithBody($url,$header,$method,$body_data_json){
        $curl = curl_init($this->base_url.$url);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $body_data_json);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    } 

    public function grant()
    {
        $header = array(
                'Content-Type:application/json',
                'username:'. env('BKASH_USER_NAME'),
                'password:'. env('BKASH_PASSWORD'),
                );
        $header_data_json=json_encode($header);

        $body_data = array('app_key'=> env('BKASH_APP_KEY'), 'app_secret'=>env('BKASH_APP_SECRET'));
        $body_data_json=json_encode($body_data);
        
       
        $response = $this->curlWithBody('/tokenized/checkout/token/grant',$header,'POST',$body_data_json);
        

        
        $token = json_decode($response)->id_token;
        
        return $token;
       
    }

    public function payment(Request $request)
    {
        return view('Bkash.pay');
    }


    public function createPayment(Request $request)
    {
        // dd($request->all());
        // if(!$request->amount || $request->amount < 1){
        //     return redirect()->route('url-pay');
        // }
        
        // dd('ok bkash'); 

        $header =$this->authHeaders();

        $website_url = URL::to("/");

        $body_data = array(
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => $website_url.'/bkash/callback',
            // 'amount' => $request->amount,
            'amount' => Session::get('grand_total'),
            'currency' => 'BDT', 
            'intent' => 'sale',
            'merchantInvoiceNumber' => "Inv".Str::random(8) 
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/create',$header,'POST',$body_data_json);

        return redirect((json_decode($response)->bkashURL));
    }

    public function executePayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID
        );

        $body_data_json=json_encode($body_data);

        

        $response = $this->curlWithBody('/tokenized/checkout/execute',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);
        
        if(isset($res_array['trxID'])){
            // your database insert operation      
        }
        return $response;
        
    }

    public function queryPayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID,
        );

        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/status',$header,'POST',$body_data_json);
        
        $res_array = json_decode($response,true);
        
        if(isset($res_array['trxID'])){
            // your database insert operation    
        }

         return $response;
    }

    public function callback(Request $request)
    {
        $allRequest = $request->all();
 
        if(isset($allRequest['status']) && $allRequest['status'] == 'failure'){
            return view('Bkash.fail')->with([
                'response' => 'Payment Failed !!'
            ]);

        }else if(isset($allRequest['status']) && $allRequest['status'] == 'cancel'){
            return view('Bkash.fail')->with([
                'response' => 'Payment Cancelled !!'
            ]);

        }else{
            
            $response = $this->executePayment($allRequest['paymentID']);

            $res_array = json_decode($response,true);
    
            if(array_key_exists("statusCode",$res_array) && $res_array['statusCode'] != '0000'){
                return view('Bkash.fail')->with([
                    'response' => $res_array['statusMessage'],
                ]);
            }
            
            if(array_key_exists("message",$res_array)){
                // if execute api failed to response
                sleep(1);
                $query = $this->queryPayment($allRequest['paymentID']);
                return view('Bkash.success')->with([
                    'response' => $query
                ]);
            }

            // $order_count = Order::count('id');  
            // $count_plus = $order_count + 1;
            // $order_code = date("dmy").random_int(100, 999).sprintf('%06d', $count_plus);

            $order_code = Session::get('order_code');
            // return redirect()->route('order.complete', $order_code);
            
            
            $info = Order::where('code', $order_code)->first();
            $info->transaction_id = $res_array['trxID'];
            $info->save();
            if (!is_null($info)) {
    
                foreach (Cart::content() as $cart) {
                    $product_id = $cart->options->product_id;
                    $variation = $cart->weight;
                    $qty = $cart->qty;
    
                    $product = Product::find($product_id);
                    if(!is_null($product)) {
                        if($variation == 0) {
                            $stock_info = $product->single_stock;
                            $stock_info->qty -= $qty;
                            if($stock_info->qty < 0) {
                                $stock_info->qty = 0;
                            }
                            $stock_info->save();
                        }
                        else {
                            $stock_info = ProductStocks::find($variation);
                            if(!is_null($stock_info)) {
                                $stock_info->qty -= $qty;
                                if($stock_info->qty < 0) {
                                    $stock_info->qty = 0;
                                }
                                $stock_info->save();
                            }
                        }
                    }
    
                    //running
    
                    Cart::remove($cart->rowId);
                }

            }

            return view('Bkash.complete')->with([
                'response' => $res_array['trxID'],
                'order_code' =>$order_code,
            ]);
        }

    }

    public function getRefund(Request $request)
    {
        return view('Bkash.refund');
    }

    public function refundPayment(Request $request)
    {
        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $request->paymentID,
            'amount' => $request->amount,
            'trxID' => $request->trxID,
            'sku' => 'sku',
            'reason' => 'Quality issue'
        );
     
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/refund',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);

        if(isset($res_array['refundTrxID'])){
            // your database insert operation    
        }
        
        return view('Bkash.refund')->with([
            'response' => $response,
        ]);
    }         
    
}
