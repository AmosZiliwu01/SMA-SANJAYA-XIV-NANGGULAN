<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->text('user_agent')->nullable();
            $table->string('page_url')->nullable();
            $table->timestamp('visited_at');
            $table->string('visitor_id')->nullable();
            $table->timestamps();

            // Index untuk performa query
            $table->index(['ip_address', 'visited_at']);
            $table->index('visited_at');

            // untuk ID unik per browser
            $table->index('visitor_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
