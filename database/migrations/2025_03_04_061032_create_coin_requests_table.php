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
        Schema::create('coin_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->string('title');
            $table->string('content')->nullable();
            $table->string('status');
            $table->timestamp('approved_date')->nullable();
            $table->timestamp('denied_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_requests');
    }
};
