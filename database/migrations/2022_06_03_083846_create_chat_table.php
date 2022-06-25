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
        Schema::create('chats', function (Blueprint $table) {
            $table->id('id');
        });

        Schema::table('chats', function(Blueprint $table){
        $table->bigInteger('sender_id')->unsigned()->index(); // this is working
        $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        $table->bigInteger('receiver_id')->unsigned()->index(); // this is working
        $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
};
