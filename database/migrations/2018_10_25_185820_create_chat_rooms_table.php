<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->unsignedInteger('create_user');
            $table->foreign('create_user')->references('id')->on('users');
            $table->json('member_list')->nullable();
            $table->json('black_list')->nullable();
            $table->tinyInteger('type')->comment('1公共室2私有室3匿名室');
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
        Schema::dropIfExists('chat_rooms');
    }
}
