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
        Schema::create('wordsets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_puzzle_english')->unique();
            $table->string('title');
            $table->dateTimeTz('learnt_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wordsets');
    }
};
