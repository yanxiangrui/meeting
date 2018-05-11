<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity_key', 50)->comment('身份证ID');
            $table->string('member_level_id', 50)->comment('等级ID');
            $table->string('name', 100)->comment('姓名');
            $table->tinyInteger('sex')->comment('性别');
            $table->string('address', 255)->comment('地址');
            $table->string('race', 50)->comment('民族');
            $table->string('mobile', 20)->nullable(true)->comment('手机号码');
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
        Schema::dropIfExists('members');
    }
}
