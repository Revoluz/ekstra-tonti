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
        Schema::create('imgyear', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
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
        // Schema::dropIfExists('imgyear');
        Schema::table('imgyear', function (Blueprint $table) {
        $table->dropForeign(['tahun_id']);
        $table->dropColumn(['tahun_id']);
        });
    }
};
