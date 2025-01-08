<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCourierInfo extends Model
{
    use HasFactory;

    public $pathaoGetStoresUrl;
    public $pathaoCityUrl;
    public $pathaoZoneUrl;
    public $pathaoAreaUrl;
    public $pathaoCreateParcelUrl;
    
    public const MAX_DELIVERY_ATTEMPTS = 3;

    public function __construct()
    {
        $this->pathaoGetStoresUrl = env('PATHAO_BASE_URL') . '/aladdin/api/v1/stores';
        $this->pathaoCityUrl = env('PATHAO_BASE_URL') . '/aladdin/api/v1/countries/1/city-list';
        $this->pathaoCreateParcelUrl = env('PATHAO_BASE_URL') . '/aladdin/api/v1/orders';
    }

    public function setPathaoZoneUrl($cityId)
    {
        $this->pathaoZoneUrl = env('PATHAO_BASE_URL') . "/aladdin/api/v1/cities/{$cityId}/zone-list";
    }

    // $deliveryCourierInfo = new DeliveryCourierInfo();
    // $deliveryCourierInfo->setPathaoZoneUrl(1); // Assuming the city ID is 1
    // $pathaoZoneUrl = $deliveryCourierInfo->pathaoZoneUrl;

    public function setPathaoAreaUrl($zoneId)
    {
        $this->pathaoAreaUrl = env('PATHAO_BASE_URL') . "/aladdin/api/v1/zones/{$zoneId}/area-list";
    }
    


}
