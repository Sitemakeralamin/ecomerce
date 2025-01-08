<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleTageManagerColumnsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->longText('google_map_link')->nullable()->after('address');
            $table->longText('google_map_embed')->nullable()->after('google_map_link');
            $table->longText('google_tag_manager_head')->nullable()->after('google_map_embed');
            $table->longText('google_tag_manager_body')->nullable()->after('google_tag_manager_head');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('google_map_link');
            $table->dropColumn('google_map_embed');
            $table->dropColumn('google_tag_manager_head');
            $table->dropColumn('google_tag_manager_body');
        });
    }
}
