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
        Schema::table('wordsets', function (Blueprint $table) {
            $table->boolean('repeat_30days')->default(false);
            $table->boolean('repeat_90days')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wordsets', function (Blueprint $table) {
            $table->dropColumn([
                'repeat_30days',
                'repeat_90days'
            ]);
        });
    }
};
