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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->json('information')->nullable(); // contains title, subtitle, images, etc.
            $table->json('tour')->nullable(); // array of days/locations
            $table->json('locationshare')->nullable(); // array of locations
            $table->json('feature')->nullable(); // array of feature IDs
            $table->json('reviews')->nullable(); // array of Reviews containing the email name , description and rating 
            $table->json('services')->nullable(); // array of service IDs
            $table->json('gallery')->nullable(); // array of images 
            $table->integer('place_id')->nullable(); // Place ID 
            $table->integer('pricing')->default(0);
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
