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
    Schema::create('package_bookings', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('package_id');

        $table->date('date')->nullable();
        $table->string('user_name');
        $table->string('user_phone');
        $table->string('user_email')->nullable();

        $table->integer('no_of_riders')->default(1);

        $table->json('services')->nullable();

        $table->integer('amount')->default(0);

        $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');

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
        Schema::dropIfExists('package_bookings');
    }
};
