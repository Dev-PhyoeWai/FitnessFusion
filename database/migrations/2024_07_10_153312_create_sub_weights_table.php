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
        Schema::create('sub_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained('subscription_types')->onDelete('cascade');
            $table->foreignId('weight_id')->constrained('weight_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_weights');
    }
};
