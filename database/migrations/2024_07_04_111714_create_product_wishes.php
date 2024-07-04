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
        Schema::create('product_wishes', function (Blueprint $table) {
            $table->id();

            //Foreign key
            $table->string('email');
            $table->unsignedBigInteger('product_id');

            //relationship
            $table->foreign('email')->references('email')->on('profiles')->restrictOnDelete()->cascadeOnDelete();

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
        Schema::dropIfExists('product_wishes');
    }
};
