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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('restrict');
            $table->unsignedBigInteger('duration_id');
            $table->foreign('duration_id')->references('id')->on('durations')->onDelete('restrict');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('restrict');
            $table->unsignedBigInteger('broker_id');
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('restrict');
            $table->text('transaction_date');
            $table->text('checkin_date');
            $table->text('checkout_date');
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
        Schema::dropIfExists('transactions');
    }
};
