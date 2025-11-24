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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();            
            $table -> string("name");
            $table->json("images")->nullable();
            $table->string("rc")->nullable();
            $table -> string("model");
            $table -> string("number");
            $table -> string("status")->default('available');
            $table->unsignedBigInteger('v_cat_id');
            $table->foreign('v_cat_id')
            ->references('id')
            ->on('v_cat_id')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
