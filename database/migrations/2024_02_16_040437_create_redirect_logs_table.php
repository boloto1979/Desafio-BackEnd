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
        Schema::create('redirect_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('redirect_id')->constrained()->onDelete('cascade');
            $table->string('ip');
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->text('query_params')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirect_logs');
    }
};
