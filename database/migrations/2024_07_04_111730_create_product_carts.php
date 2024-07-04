<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_carts', function (Blueprint $table) {
            $table->id();
            $table->string('color' , 50);
            $table->string('size' , 50);

            //Foreign key
            $table->string('email' , 50);
            $table->unsignedBigInteger('product_id');

            
            $table->foreign('email')->references('email')->on('profiles')->restrictOnDelete()->cascadeOnDelete();

            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_carts');
    }
};
