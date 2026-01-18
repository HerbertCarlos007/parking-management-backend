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
        Schema::create('parking_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone', 20);
            $table->string('email');
            $table->unsignedInteger('total_spots');
            $table->unsignedInteger('grace_period_minutes')->default(0);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->decimal('hourly_rate', 10, 2)->default(0.00);
            $table->decimal('half_hour_rate', 10, 2)->nullable();
            $table->decimal('daily_rate', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_settings');
    }
};
