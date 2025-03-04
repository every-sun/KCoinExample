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
        Schema::create('coin_use_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer("used_coins");
            $table->timestamp("cancel_request_date")->nullable();
            $table->timestamp("cancel_complete_date")->nullable();
            $table->timestamp("completed_date")->nullable();
            $table->string("status");   // E: 지급완료 W: 신청중 CW: 취소신청중 CC: 취소완료
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_use_requests');
    }
};
 