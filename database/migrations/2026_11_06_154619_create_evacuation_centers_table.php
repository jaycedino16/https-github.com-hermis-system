
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evacuation_centers', function (Blueprint $table) {
            $table->id();

            // Evacuation Center Information
            $table->string('center_name');
            $table->string('address');
            $table->string('purok')->nullable();
            $table->string('barangay')->default('Anoling');

            // Contact Information
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();

            // Capacity and Facilities
            $table->unsignedInteger('capacity');
            $table->text('facilities')->nullable();

            // Location for future map integration
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Center Status
            $table->string('status')->default('Active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evacuation_centers');
    }
};
