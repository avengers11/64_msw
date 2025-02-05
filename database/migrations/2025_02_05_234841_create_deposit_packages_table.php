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
        Schema::create('deposit_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer("parent_id")->nullable();
            $table->integer('package_id')->default(0);
            $table->string('tranx_id')->nullable();
            $table->string('method')->default(0);
            $table->string('file')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('deposit_packages');
    }
};
