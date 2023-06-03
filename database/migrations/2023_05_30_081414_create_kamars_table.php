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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alamat_id');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('restrict');
            $table->text('no_kamar')->nullable();
            $table->text('description')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('kamars');
    }
};
