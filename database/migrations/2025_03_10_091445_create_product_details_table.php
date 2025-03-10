<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('product_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id'); // Foreign key to products
        $table->string('color')->nullable();
        $table->string('size')->nullable();
        $table->string('material')->nullable();
        $table->timestamps();

        // Set up foreign key constraint
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
