<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evacuations', function (Blueprint $table) {
            $table->id();

            // Connected household
            $table->foreignId('household_id')
                ->constrained('households')
                ->cascadeOnDelete();

            // Evacuation Information
            $table->string('evacuation_status')
                ->default('Not Evacuated');

            $table->string('evacuation_center')->nullable();

            $table->unsignedInteger('evacuees_count')
                ->default(0);

            // Evacuation Dates
            $table->timestamp('evacuated_at')->nullable();

            $table->timestamp('returned_home_at')->nullable();

            // Additional Information
            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index('evacuation_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evacuations');
    }
};