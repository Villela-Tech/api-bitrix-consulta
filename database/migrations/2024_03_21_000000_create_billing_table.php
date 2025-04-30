<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTable extends Migration
{
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->boolean('is_permanent')->default(true);  // Já começa como true por padrão
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('billing');
    }
} 