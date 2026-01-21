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
        Schema::table('parking_settings', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
            $table->unsignedInteger('total_spots')->nullable()->change();
            $table->unsignedInteger('grace_period_minutes')->nullable()->default(0)->change();
            $table->time('opening_time')->nullable()->change();
            $table->time('closing_time')->nullable()->change();
            $table->decimal('hourly_rate', 10, 2)->nullable()->default(0.00)->change();
            $table->decimal('half_hour_rate', 10, 2)->nullable()->change();
            $table->decimal('daily_rate', 10, 2)->nullable()->default(0.00)->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parking_settings', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->unsignedInteger('total_spots')->nullable();
            $table->unsignedInteger('grace_period_minutes')->nullable()->default(0);
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable()->default(0.00);
            $table->decimal('half_hour_rate', 10, 2)->nullable();
            $table->decimal('daily_rate', 10, 2)->nullable()->default(0.00);
        });
    }
};
