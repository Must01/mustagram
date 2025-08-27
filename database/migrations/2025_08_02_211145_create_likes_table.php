<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('likes', function (Blueprint $connection) {
            $connection->index('user_id');
            $connection->index('post_id');
            $connection->index('comment_id');
            $connection->unique(['user_id', 'post_id']);
            $connection->unique(['user_id', 'comment_id']);
            $connection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('likes');
    }
};
