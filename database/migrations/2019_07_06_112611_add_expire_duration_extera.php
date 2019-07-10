<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpireDurationExtera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('duration_hour_current')->nullable();
            $table->integer('duration_day_current')->nullable();
            $table->integer('expire_date_hour_current')->nullable();
            $table->integer('expire_date_day_current')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('duration_hour_current');
            $table->dropColumn('duration_day_current');
            $table->dropColumn('expire_date_hour_current');
            $table->dropColumn('expire_date_day_current');
        });
    }
}
