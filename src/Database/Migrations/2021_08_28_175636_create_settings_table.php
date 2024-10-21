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
        Schema::create('onix_settings', function (Blueprint $table) {
            $table->id();
            $table->string('color_primary')->default('#000000ff')->nullable();
            $table->string('color_secondary')->default('#14213dff')->nullable();
            $table->string('color_tertiary')->default('#fca311ff')->nullable();
            $table->string('color_quaternary')->default('#e5e5e5ff')->nullable();
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
        Schema::dropIfExists('onix_settings');
    }
};
