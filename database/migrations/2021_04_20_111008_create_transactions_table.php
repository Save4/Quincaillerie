<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->integer('paid_amount');
            $table->integer('balance');
            $table->string('payment_method')->default('cash');
            $table->unsignedBigInteger('user_id');
            $table->date('transac_date');
            $table->integer('transac_amount');
            $table->timestamps();
            $table->foreign('client_id')
                ->references('id')
                ->onUpdate('cascade')
                ->on('clients')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
}
