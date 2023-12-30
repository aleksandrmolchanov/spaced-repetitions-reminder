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
            $table->boolean('repeat_1hour')->default(false);
            $table->boolean('repeat_8hours')->default(false);
            $table->boolean('repeat_1day')->default(false);
            $table->boolean('repeat_3days')->default(false);
            $table->boolean('repeat_7days')->default(false);
            $table->boolean('repeat_16days')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wordsets', function (Blueprint $table) {
            $table->dropColumn([
                'repeat_1hour',
                'repeat_8hours',
                'repeat_1day',
                'repeat_3days',
                'repeat_7days',
                'repeat_16days'
            ]);
        });
    }
};
