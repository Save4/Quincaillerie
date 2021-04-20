<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monnaie_id');
            $table->unsignedBigInteger('unite_id');
            $table->unsignedBigInteger('magasin_id');
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->string('product_name');
            $table->text('description');
            $table->string('brand');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('achat');
            $table->timestamps();
            $table->foreign('monnaie_id')
                ->references('id')
                ->on('monnaies')
                ->onDelete('cascade');
            $table->foreign('unite_id')
                ->references('id')
                ->on('unites')
                ->onDelete('cascade');
            $table->foreign('magasin_id')
                ->references('id')
                ->on('magasins')
                ->onDelete('cascade');
            $table->foreign('fournisseur_id')
                ->references('id')
                ->on('fournisseurs')
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
        Schema::dropIfExists('products');
    }
}
