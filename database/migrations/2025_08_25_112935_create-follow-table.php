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
        Schema::connection('mongodb')->create('follow', function (Blueprint $connection) {
            $connection->index('follower_id');
            $connection->index('following_id');

            // prevent the user from following the same person twice
            $connection->unique(['follower_id', 'following_id']);
            
            $connection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('follow');
    }
};
