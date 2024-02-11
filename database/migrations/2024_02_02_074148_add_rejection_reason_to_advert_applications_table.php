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
        Schema::table('advert_applications', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('document_comments');
            $table->text('rejection_reason')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advert_applications', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('rejection_reason');
        });
    }
};
