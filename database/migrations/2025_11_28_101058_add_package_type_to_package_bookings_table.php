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
                Schema::table('package_bookings', function (Blueprint $table) {
                    $table->string('package_type')->nullable()->after('package_id');
                });
            }

            public function down()
            {
                Schema::table('package_bookings', function (Blueprint $table) {
                    $table->dropColumn('package_type');
                });
            }

};
