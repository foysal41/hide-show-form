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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('img1' , 200);
            $table->string('img2' , 200);
            $table->string('img3' , 200);
            $table->string('img4' , 200);
            $table->longText('des');
            $table->string('color' , 200);
            $table->string('size' , 200);
            
            //Foreign key
            $table->unsignedBigInteger('product_id')->unique();
            //unique করার কারণ হচ্ছে : একটা product এর জন্য অনলি একটা product details থাকবে। 

            //Relationship
            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnDelete();

            $table->timestamp('created_at')->userCurrent();
            $table->timestamp('updated_at')->userCurrent()->userCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
