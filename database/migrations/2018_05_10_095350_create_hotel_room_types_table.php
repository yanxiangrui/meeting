<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->comment('酒店ID');
            $table->string('title', 100)->comment('房间标题，例如：标间、总统套房'); 
            $table->tinyInteger('bed_total')->comment('房间床位数量');
            $table->decimal('price', 8, 2)->comment('房间费用');
            $table->decimal('bed_price', 8, 2)->comment('床位费用');
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
        Schema::dropIfExists('hotel_room_types');
    }
}
