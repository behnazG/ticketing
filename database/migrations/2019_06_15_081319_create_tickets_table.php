<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sender_id')->default(0)->comment("فرستنده تیکت");
            $table->bigInteger('receiver_id')->default(0)->comment("کسی  که تیکت را پیگیری میکند‍‍");
            $table->bigInteger('ticket_id')->nullable();
            $table->integer('category_id');
            $table->integer('organizational_chart_id');
            $table->integer('valid')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->string('subject');
            $table->text('text');
            $table->dateTime('duration')->nullable();
            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();
            $table->tinyInteger('trash')->default(0);
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
        Schema::dropIfExists('tickets');
    }
}
