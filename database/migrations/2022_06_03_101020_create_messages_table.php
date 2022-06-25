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
        Schema::create('messages', function (Blueprint $table) {
            $table->id('id');
            $table->string('body', 1000);
            $table->boolean('read');
            // $table->bigInteger('sender_id')->unsigned()->index(); // this is working
            $table->timestamp('created_at');
        });

        Schema::table('messages', function(Blueprint $table){
            $table->bigInteger('chat_id')->unsigned()->index(); // this is working
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');


            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
