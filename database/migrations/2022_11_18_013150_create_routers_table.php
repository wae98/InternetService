<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->id();
            $table->string('onu_number');
            $table->string('onu_type');
            $table->string('onu_position');
            $table->string('mac_address');
            $table->string('ip_number');
            $table->string('vlan');
            $table->string('pon_number');
            $table->string('slot');
            $table->string('identification');
            $table->string('color_pictel');
            $table->unsignedBigInteger('status_router_id');
            $table->foreign('status_router_id')->references('id')->on('status_routers');
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
        Schema::dropIfExists('routers');
    }
};
