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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('address');
            $table->string('description')->nullable();
            $table->string('phone_number')->unique();
            $table->string('vat')->unique();
            $table->string('photo')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_default')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
