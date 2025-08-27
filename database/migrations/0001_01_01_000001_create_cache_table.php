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
        Schema::connection('mongodb')->create('cache', function (Blueprint $connection) {
            $connection->index('key');
            $connection->index('value');
            $connection->index('expiration');
        });

        Schema::connection('mongodb')->create('cache_locks', function (Blueprint $connection) {
            $connection->index('key');
            $connection->index('owner');
            $connection->index('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('cache');
        Schema::connection('mongodb')->dropIfExists('cache_locks');
    }
};
