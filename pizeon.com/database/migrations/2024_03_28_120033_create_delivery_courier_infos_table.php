<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCourierInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_courier_infos', function (Blueprint $table) {
            $table->id();
            $table->string('courier_type')->nullable()->comment('pathao, redx, ecourier');
            $table->string('order_code')->index();
            $table->string('consignment_id')->nullable();
            
            $table->string('delivery_fee')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->mediumText('recipient_address')->nullable();
            $table->string('city_text')->nullable();
            $table->string('zone_text')->nullable();
            $table->string('area_text')->nullable();
            $table->string('recipient_zone')->nullable();
            $table->string('recipient_area')->nullable();
            $table->string('delivery_type')->nullable()->comment('48 for normal delivery or 12 for on demand delivery');
            $table->string('item_type')->nullable()->comment('1 for document, 2 for parcel');
            $table->longText('special_instruction')->nullable();
            $table->string('item_quantity')->nullable();
            $table->string('item_weight')->nullable();
            $table->string('amount_to_collect')->nullable();
            $table->longText('item_description')->nullable();
            $table->longText('admin_note')->nullable();
            $table->string('status')->default('active')->comment('active, canceled');
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_courier_infos');
    }
}
