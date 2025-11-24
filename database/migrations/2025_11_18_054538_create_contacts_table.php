<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
        {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->text('message');
                $table->boolean('is_new')->default(true);   // for admin ranking
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('contacts');
        }

};
