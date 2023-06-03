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
        Schema::create('kamar_durations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('restrict');
            $table->unsignedBigInteger('duration_id');
            $table->foreign('duration_id')->references('id')->on('durations')->onDelete('restrict');
            $table->text('harga');
            $table->text('updater')->nullable();
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
        Schema::dropIfExists('kamar_durations');
    }
};
