<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productphones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('DeviceName')->nullable();
            $table->text('Brand')->nullable();
            $table->text('technology')->nullable();
            $table->text('gprs')->nullable();
            $table->text('edge')->nullable();
            $table->text('announced')->nullable();
            $table->text('status')->nullable();
            $table->text('dimensions')->nullable();
            $table->text('weight')->nullable();
            $table->text('sim')->nullable();
            $table->text('type')->nullable();
            $table->text('size')->nullable();
            $table->text('resolution')->nullable();
            $table->text('display_c')->nullable();
            $table->text('card_slot')->nullable();
            $table->text('loudspeaker_')->nullable();
            $table->text('sound_c')->nullable();
            $table->text('wlan')->nullable();
            $table->text('bluetooth')->nullable();
            $table->text('gps')->nullable();
            $table->text('radio')->nullable();
            $table->text('usb')->nullable();
            $table->text('features_c')->nullable();
            $table->text('battery_c')->nullable();
            $table->text('colors')->nullable();
            $table->text('sar_eu')->nullable();
            $table->text('sensors')->nullable();
            $table->text('cpu')->nullable();
            $table->text('internal')->nullable();
            $table->text('os')->nullable();
            $table->text('body_c')->nullable();
            $table->text('video')->nullable();
            $table->text('speed')->nullable();
            $table->text('network_c')->nullable();
            $table->text('chipset')->nullable();
            $table->text('features')->nullable();
            $table->text('protection')->nullable();
            $table->text('gpu')->nullable();
            $table->text('loudspeaker')->nullable();
            $table->text('audio_quality')->nullable();
            $table->text('nfc')->nullable();
            $table->text('camera')->nullable();
            $table->text('display')->nullable();
            $table->text('performance')->nullable();
            $table->text('build')->nullable();
            $table->text('models')->nullable();
            $table->text('price')->nullable();
            $table->text('sar')->nullable();
            $table->text('single')->nullable();
            $table->text('dual_')->nullable();
            $table->text('triple')->nullable();
            $table->text('charging')->nullable();
            $table->text('_2g_bands')->nullable();
            $table->text('_3_5mm_jack_')->nullable();
            $table->text('_3g_bands')->nullable();
            $table->text('_4g_bands')->nullable();
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
        Schema::dropIfExists('productphones');
    }
}
