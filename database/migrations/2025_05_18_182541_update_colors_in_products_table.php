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
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('color');
        $table->dropColumn('color_code');
        $table->json('colors')->nullable();
        $table->json('color_codes')->nullable();
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('colors');
        $table->dropColumn('color_codes');
        $table->string('color')->nullable();
        $table->string('color_code')->nullable();
    });
}

};
