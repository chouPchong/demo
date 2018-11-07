<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatContentsDropTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_contents', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->timestamp('publish_at');
            $table->timestamp('storage_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_contents', function (Blueprint $table) {
            $table->dropColumn('storage_at');
            $table->dropColumn('publish_at');
            $table->timestamps();
        });
    }
}
