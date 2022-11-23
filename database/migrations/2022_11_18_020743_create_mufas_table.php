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
        Schema::create('mufas', function (Blueprint $table) {
            $table->id();
            $table->string('ubication');
            $table->integer('number');
            $table->boolean('is_cable_onu');
            $table->boolean('status')->default(1);
            $table->string('position_onu_olt');
            $table->integer('number_conexion');
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
        Schema::dropIfExists('mufas');
    }
};
