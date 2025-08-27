<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mongodb')->create('users', function (Blueprint  $collection) {
            $collection->index('name');       // searchable name
            $collection->index('username');
            $collection->unique('email');     // ensure unique email
            $collection->index('password');   // not strictly needed, but you had it
            $collection->index('profile_img');
            $collection->index('bio');
            $collection->timestamps();        // created_at + updated_at
        });

        Schema::connection('mongodb')->create('password_reset_tokens', function (Blueprint $collection) {
            $collection->index('email');      // fast lookup by email
            $collection->unique('token');     // ensure token is unique
            $collection->index('created_at'); // index for cleanup by date
        });

        Schema::connection('mongodb')->create('sessions', function (Blueprint $collection) {
            $collection->index('user_id');    // allow querying sessions by user
            $collection->index('ip_address'); // optional
            $collection->index('user_agent'); // optional
            $collection->index('last_activity');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('users');
        Schema::connection('mongodb')->dropIfExists('password_reset_tokens');
        Schema::connection('mongodb')->dropIfExists('sessions');
    }
};
