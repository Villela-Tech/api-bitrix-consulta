<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bitrix_id');
            $table->string('email', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('second_name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('domain', 191)->nullable();
            $table->string('lang', 10)->nullable();
            $table->boolean('is_bitrix_admin')->default(0);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->index('client_id');	
            $table->nullableTimestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
