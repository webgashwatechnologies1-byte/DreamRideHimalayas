<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();

                $table->string('title');
                $table->json('author')->nullable();           // name, passion, image, description
                $table->longText('content')->nullable();      // HTML string
                $table->string('reading_time')->nullable();   // example "5 min"
                $table->json('tags')->nullable();             // ["travel","mountains"]
                $table->json('meta_description')->nullable(); // SEO meta
                $table->json('comments')->nullable();         // list of comment objects
                $table->string('thumbnail')->nullable();
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
