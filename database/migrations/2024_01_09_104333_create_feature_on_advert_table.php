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
        Schema::create('feature_on_advert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id');
            $table->foreign('advert_id')->references('id')->on('advert');
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id')->references('id')->on('feature');
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
        Schema::dropIfExists('feature_on_advert');
    }
};
