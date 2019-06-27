<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ticket_id');
            $table->integer('user_id');
            $table->integer('receiver_id')->nullable();
            $table->text('comment')->nullable();
            $table->string('time_user')->nullable();
            $table->dateTime('start_time_system')->nullable();
            $table->dateTime('end_time_system')->nullable();
            $table->tinyInteger('ticket_status')->default(0);
            $table->tinyInteger('type')->default(0);
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
        Schema::dropIfExists('ticket_logs');
    }
}
