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
        Schema::table('users', function (Blueprint $table) {
            $table->string("deposit_bkash_number")->nullable();
            $table->string("deposit_bkash_info")->nullable();
            $table->string("deposit_nagad_number")->nullable();
            $table->string("deposit_nagad_info")->nullable();
            $table->string("deposit_rocket_number")->nullable();
            $table->string("deposit_rocket_info")->nullable();
            $table->string("deposit_upay_number")->nullable();
            $table->string("deposit_upay_info")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("deposit_bkash_number");
            $table->dropColumn("deposit_bkash_info");
            $table->dropColumn("deposit_nagad_number");
            $table->dropColumn("deposit_nagad_info");
            $table->dropColumn("deposit_rocket_number");
            $table->dropColumn("deposit_rocket_info");
            $table->dropColumn("deposit_upay_number");
            $table->dropColumn("deposit_upay_info");
        });
    }
};
