<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpireDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_logs', function (Blueprint $table) {
            $table->integer('duration_hour')->nullable();
            $table->integer('duration_day')->after('duration_hour')->nullable();
            $table->integer('expire_date_hour')->nullable();
            $table->integer('expire_date_day')->after('expire_date_hour')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_logs', function (Blueprint $table) {
            $table->dropColumn('duration_hour');
            $table->dropColumn('duration_day');
            $table->dropColumn('expire_date_hour');
            $table->dropColumn('expire_date_day');
        });
    }
}
