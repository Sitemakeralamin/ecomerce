<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryCourierInfo;
use Illuminate\Support\Facades\Http;
use Codeboxr\PathaoCourier\Facade\PathaoCourier;
use Illuminate\Support\Facades\Redirect;

class DeliveryCourierInfoController extends Controller
{
    public function optionMaker($value, $text) {
        return '<option value="'.$value.'">'.$text.'</option>'; 
    }
    
    function pathaoApiGetMethodData($url) {

        $headers = array(
            'Authorization: Bearer '.env('PATHAO_CLIENT_SECRET'),
            'Content-Type: application/json',
            'Accept: application/json'
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            return "Error: " . $error;
        }

        curl_close($curl);
        $responseData = json_decode($response, true);

        if (isset($responseData['code']) && $responseData['code'] == 200) {
            return $responseData['data'];
        } else {
            return "Error: Unable to fetch cities";
        }
    }

    function getPathaoCities() {
        return $this->pathaoApiGetMethodData((new DeliveryCourierInfo())->pathaoCityUrl);
    }

    function getPathaoCityToZone($cityId) {
        $deliveryCourierInfo = new DeliveryCourierInfo();
        $deliveryCourierInfo->setPathaoZoneUrl($cityId);
        $pathaoZoneUrl = $deliveryCourierInfo->pathaoZoneUrl;
        return $this->pathaoApiGetMethodData($pathaoZoneUrl);
    }

    function getPathaoZoneToArea($zoneId) {
        $deliveryCourierInfo = new DeliveryCourierInfo();
        $deliveryCourierInfo->setPathaoAreaUrl($zoneId);
        $pathaoAreaUrl = $deliveryCourierInfo->pathaoAreaUrl;
        return $this->pathaoApiGetMethodData($pathaoAreaUrl);
    }


    public function getZoneInfoFromCourierType(Request $request) {
        $courierType = $request->courierType;
        if($courierType == '') {
            return;
        }

        if($courierType == 'pathao') {
            $cities = PathaoCourier::area()->city(); //$this->getPathaoCities();
            //return $cities;
            $component = View('components.pathao-city-zone-area-section', compact('cities'));
        }

        $renderedComponent = $component->render();
        return Response($renderedComponent);
    }

    public function pathaoCityToZoneList(Request $request) {
        $city = $request->city;
        if($city == '') {
            return;
        }

        $zones = PathaoCourier::area()->zone($city); //$this->getPathaoCityToZone($city);
        $output = '<option value="">-- Select Zone --</option>';
        foreach($zones->data as $zone) {
            $output .= $this->optionMaker($zone->zone_id, $zone->zone_name);
        }

        return Response($output);
    }

    public function pathaoZoneToAreaList(Request $request) {
        $zone = $request->zone;
        if($zone == '') {
            return;
        }

        $areaList = PathaoCourier::area()->area($zone); //$this->getPathaoZoneToArea($zone);
        $output = '<option value="">-- Select Area --</option>';
        foreach($areaList->data as $area) {
            $output .= $this->optionMaker($area->area_id, $area->area_name);
        }

        return Response($output);
    }

    public function getPathaoToken() {
        $pathaoClientID = env('PATHAO_CLIENT_ID');
        $pathaoClientSecret = env('PATHAO_CLIENT_SECRET');

        $curl = curl_init();
    }

    public function sendPathaoCourierData(Request $request) {

        $response = PathaoCourier::order()->create([
            "store_id"            => env('PATHAO_STORE_ID'),
            "merchant_order_id"   => $request->merchant_order_id,
            "recipient_name"      => $request->recipient_name ?? "",
            "recipient_phone"     => $request->recipient_phone ?? "",
            "recipient_address"   => $request->recipient_address ?? "",
            "recipient_city"      => $request->recipient_city ?? "",
            "recipient_zone"      => $request->recipient_zone ?? "",
            "recipient_area"      => $request->recipient_area ?? "",
            "delivery_type"       => $request->delivery_type ?? "",
            "item_type"           => $request->item_type ?? "",
            "special_instruction" => $request->special_instruction ?? "",
            "item_quantity"       => $request->item_quantity ?? "",
            "item_weight"         => $request->item_weight ?? "",
            "amount_to_collect"   => $request->amount_to_collect ?? "",
            "item_description"    => $request->item_description ?? ""
        ]);
    
        if (isset($response->consignment_id)) {
            return [
                'status' => 'success',
                'consignment_id' => $response->consignment_id,
                'merchant_order_id' => $response->merchant_order_id,
                'order_status' => $response->order_status,
                'delivery_fee' => $response->delivery_fee
            ];
        } else {
            return [
                'status' => 'error',
                'message' => $response->message ?? 'Unknown error',
                'code' => $response->code ?? 500,
                'errors' => $response->errors ?? []
            ];
        }
    }
    


    public function storeDeliveryCourierData(Request $request) {
        $courier_type = $request->courier_type;

        $consignment_id = '';
        $delivery_fee = '';

        if(!isset($request->recipient_zone)) {
            return Redirect()->back()->with('error', "Reload the page, and select city.");
        }
        
    
        if ($courier_type == 'pathao') {
            $response = $this->sendPathaoCourierData($request);
           
            if ($response['status'] == 'success') {
                $consignment_id = $response['consignment_id'];
                $delivery_fee = $response['delivery_fee'];
            } 
            else {
                return Redirect()->back()->with('error', $response['message'] ?? 'Unknown error');
            }
        }


        $storeData = new DeliveryCourierInfo;

        $storeData->order_code = $request->order_code;
        $storeData->courier_type = $request->courier_type;
        $storeData->consignment_id = $consignment_id;
        $storeData->delivery_fee = $delivery_fee;
        $storeData->merchant_order_id = $request->merchant_order_id ?? '';
        $storeData->recipient_name = $request->recipient_name;
        $storeData->recipient_phone = $request->recipient_phone;
        $storeData->recipient_address = $request->recipient_address;
        $storeData->city_text = $request->city_text ?? null;
        $storeData->zone_text = $request->zone_text ?? null;
        $storeData->area_text = $request->area_text ?? null;
        $storeData->recipient_zone = $request->recipient_zone ?? null;
        $storeData->recipient_area = $request->recipient_area ?? null;
        $storeData->delivery_type = $request->delivery_type ?? null;
        $storeData->item_type = $request->item_type ?? null;
        $storeData->special_instruction = $request->special_instruction ?? null;
        $storeData->item_quantity = $request->item_quantity ?? null;
        $storeData->item_weight = $request->item_weight ?? null;
        $storeData->amount_to_collect = $request->amount_to_collect ?? null;
        $storeData->item_description = $request->item_description ?? null;

        if($storeData->save()) {
            return Redirect()->back()->with('success', 'Delivery Information Saved.');
        }
    }
    



    

}
