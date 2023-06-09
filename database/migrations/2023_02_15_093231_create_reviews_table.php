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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('votes');
            $table->mediumText('review');
            $table->timestamps();
        });


        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
