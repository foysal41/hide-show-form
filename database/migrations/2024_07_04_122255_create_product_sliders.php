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
        Schema::create('product_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title' , 200);
            $table->string('short_des' , 500);
            $table->string('image' , 200);
            
            //Foreign key
            $table->unsignedBigInteger('product_id')->unique();

            //relationship
            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->userCurrent();
            $table->timestamp('updated_at')->userCurrent()->userCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sliders');
    }
};