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
    Schema::create('package_enquiries', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('package_id');

        $table->string('date')->nullable();
        $table->string('user_name');
        $table->string('user_phone');
        $table->string('user_email')->nullable();

        $table->integer('no_of_riders')->default(1);

        $table->json('services')->nullable(); // store extras JSON
        $table->text('message')->nullable();

        $table->timestamps();

        $table->foreign('package_id')->references('id')->on('packages')->cascadeOnDelete();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_enquiries');
    }
};
