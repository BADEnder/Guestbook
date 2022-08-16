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
        Schema::create('replybooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("reply_id")->references("id")->on("guestbooks")->onDelete("cascade");
            $table->string("name", 50);
            $table->foreign("name")->references("name")->on("members")->onUpdate("cascade");
            $table->longText("content");
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
        Schema::dropIfExists('replybooks');
    }
};
