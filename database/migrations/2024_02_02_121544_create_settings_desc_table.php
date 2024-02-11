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
        Schema::create('settings_desc', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('setting_id');
            $table->foreign('setting_id')->references('id')->on('settings');

            $table->unsignedBigInteger('lang_id');
            $table->foreign('lang_id')->references('id')->on('language');

            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();

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
        Schema::dropIfExists('settings_desc');
    }
};
