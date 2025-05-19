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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->text('desc_en')->nullable();
            $table->text('desc_ar')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('color')->nullable();
            $table->string('color_code')->nullable();
            $table->string('size')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
