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
        Schema::create('onix_blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')->references('id')->on('onix_templates')->onDelete('cascade');
            $table->string('componentId');
            $table->string('label');
            $table->string('slug')->unique();
            $table->mediumText('media')->nullable();
            $table->string('category')->nullable();
            $table->tinyInteger('component_sync')->default(1);
            $table->longText('content')->nullable();
            $table->longText('block_data')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('onix_blocks');
    }
};
