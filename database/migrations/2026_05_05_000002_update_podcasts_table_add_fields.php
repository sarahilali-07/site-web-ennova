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
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('guest')->nullable()->after('title');
            $table->string('duration')->nullable()->after('guest');
            $table->string('youtube_url')->nullable()->after('duration');
            $table->string('thumbnail')->nullable()->after('youtube_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn(['guest', 'duration', 'youtube_url', 'thumbnail']);
        });
    }
};
