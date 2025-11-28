<?php

use App\Enums\EntryStatus;
use App\Enums\EntryType;
use App\Enums\SpotStatus;
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
        Schema::create('parking_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable()->constrained('clients')->cascadeOnDelete();
            $table->string('plate');
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->integer('spot_id')->constrained('parking_spots')->cascadeOnDelete();
            $table->enum('type_entry', array_column(EntryType::cases(), 'value'));
            $table->timestamp('entered_at');
            $table->timestamp('left_at')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', array_column(EntryStatus::cases(), 'value'))->default(EntryStatus::OPEN->value);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_entries');
    }
};
