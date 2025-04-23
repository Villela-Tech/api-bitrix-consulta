<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('access_token', 191);
            $table->string('expires', 191);
            $table->string('expires_in', 191);
            $table->text('scope');
            $table->string('domain', 191);
            $table->string('server_endpoint', 191);
            $table->string('status', 191);
            $table->string('client_endpoint', 191);
            $table->string('member_id', 191);
            $table->integer('user_id');
            $table->string('refresh_token', 191);
            $table->string('application_token', 191)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
