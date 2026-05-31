<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firebase_id')->unique()->nullable()->after('id');
            $table->string('avatar_url')->nullable()->after('email');
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        // password is intentionally left nullable: Firebase-signed-up rows
        // hold NULL there, and re-tightening to NOT NULL would fail.
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['firebase_id', 'avatar_url']);
        });
    }
};
