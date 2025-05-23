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
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id'); // المستخدم
    $table->string('first_name');
    $table->string('last_name');
    $table->string('phone');
    $table->string('email');
    $table->string('country');
    $table->string('city');
    $table->string('address');
    $table->date('delivery_day')->nullable();
    $table->time('delivery_time')->nullable();
    $table->text('note')->nullable();
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
