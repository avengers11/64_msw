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
        Schema::create('login_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('login_page')->nullable();
            $table->text('notice')->nullable();
            $table->string('logo')->nullable();
            $table->string('background_img')->nullable();
            $table->boolean('buy_now')->default(true);
            $table->json('contact_us')->nullable();
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
        Schema::dropIfExists('login_pages');
    }
};
