<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->comment('会议ID');  
            $table->string('name', 200)->comment('行程名称');
            $table->text('description')->nullable(true)->comment('行程描述');
            $table->decimal('price', 8, 2)->comment('行程价格'); 
            $table->dateTime('start_time')->comment('行程开始时间'); 
            $table->dateTime('end_time')->comment('行程结束时间'); 
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
        Schema::dropIfExists('meeting_journeys');
    }
}
