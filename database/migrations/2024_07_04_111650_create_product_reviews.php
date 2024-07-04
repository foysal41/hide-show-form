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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('description' , 500);
            $table->string('email' , 50);

            //Foreign key
            $table->unsignedBigInteger('product_id');

            //relationship
            $table->foreign('email')->references('email')->on('profile')->restrictOnDelete()->cascadeOnDelete();
            $table->foreign('product_id')->references();

            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnDelete();
            $table->foreign('product_id')->references();

            $table->timestamp('created_at')->userCurrent();
            $table->timestamp('updated_at')->userCurrent()->userCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
