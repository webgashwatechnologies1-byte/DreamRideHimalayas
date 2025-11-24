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
        Schema::create('ui_components', function (Blueprint $table) {
            $table->id();

            // Topbar or Header
            $table->string('component_group');  
            // topbar, header

            // Type of component
            $table->string('component_name');   
            // email, phone, logo, menu, book_now, social, text, whatsapp, etc.

            // Display label
            $table->string('label')->nullable();      
            // ex: "Home", "Call Now", "Email", "Book Now"

            // Actual value (URL, phone, email, logo)
            $table->text('value')->nullable();        
            // ex: "/about", "info@gmail.com", "logo.png"

            // Icon if needed (social, menu icons, WhatsApp icon, etc.)
            $table->string('icon_class')->nullable(); 

            // Desktop position
            $table->string('desktop_position')->default('left');   
            // left, center, right, hide

            // Mobile position
            $table->string('mobile_position')->default('sidebar'); 
            // top, bottom, sidebar, hide

            // Sorting inside each position
            $table->integer('order_no')->default(1);

            // Global visibility (top bar ON/OFF or header component ON/OFF)
            $table->boolean('visible_global')->default(true);

            // Only show on these routes
            $table->json('visible_routes')->nullable();  

            // Hide on these routes
            $table->json('hidden_routes')->nullable();   

            // Store any additional JSON attributes
            $table->json('extra_settings')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ui_components');
    }
};
