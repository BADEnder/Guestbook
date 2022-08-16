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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("user", 30);
            $table->string("name", 50)->unique();
            $table->string("email", 80);
            $table->string("password", 80);
            $table->boolean("active_status")->default(false);
            $table->string("remember_token")->nullable();
            $table->string("api_token")->nullable();
            // $table->timestamp("api_token_expired_at");
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
};
