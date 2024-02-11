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
        Schema::create('facility_on_advert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id');
            $table->foreign('advert_id')->references('id')->on('advert');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('facility');
            $table->string('value');
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
        Schema::dropIfExists('facility_on_advert');
    }
};
