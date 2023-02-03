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
        Schema::create('event', function (Blueprint $table) {
            $table->id()->startingValue(100);
            $table->string('nama_event', 100);
            $table->string('slug');
            $table->string('gambar', 255);
            $table->date('tanggal');
            $table->unsignedBigInteger('tahun_id');
            $table->foreign('tahun_id')->references('id')->on('imgyear')->onDelete('cascade') ;
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
        Schema::table('event', function (Blueprint $table) {
        $table->dropForeign(['tahun_id']);
        $table->dropColumn(['tahun_id']);
        });
        Schema::dropIfExists('event');
        // $table->dropForeign(['tahun_id']);
        // $table->dropColumn(['tahun_id']);
    }
};
