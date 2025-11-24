<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->json('about')->nullable();        // logo, description, contacts array
            $table->json('services')->nullable();     // array of {label,url}
            $table->json('gallery')->nullable();      // array of image paths
            $table->json('newsletter')->nullable();   // {show:boolean, placeholder:string, social_icons:[]}
            $table->json('bottom')->nullable();       // {copyright, social_icons:[]}
            $table->timestamps();
        });

        // Insert default single row so admin always reads/updates one row.
        DB::table('footer_settings')->insert([
            'about' => json_encode([
                'logo' => null,
                'description' => 'Join us to explore scenic routes...',
                'contacts' => [
                    ['type' => 'email', 'value' => 'dreamridehimalaya.in'],
                    ['type' => 'phone', 'value' => '910-373-5255']
                ]
            ]),
            'services' => json_encode([
                ['label' => 'About Us', 'url' => '/pages/about-us'],
                ['label' => 'Gallery', 'url' => '/pages/gallery'],
                ['label' => 'Blog Insights', 'url' => '/pages/blog'],
                ['label' => 'Contact', 'url' => '/pages/contact-us'],
            ]),
            'gallery' => json_encode([]),
            'newsletter' => json_encode([
                'show' => true,
                'placeholder' => 'Enter Email Address',
                'social_icons' => []
            ]),
            'bottom' => json_encode([
                'copyright' => 'Copyright © '.date('Y').' Dream Ride Himalaya. All Rights Reserved',
                'social_icons' => []
            ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('footer_settings');
    }
}
