<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('calendar', function (Blueprint $table) {
            $table->time('total_time')->nullable()->after('end_time');
        });
    }

    public function down(): void
    {
        Schema::table('calendar', function (Blueprint $table) {
            $table->dropColumn('total_time');
        });
    }
};