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
        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            // many-to-many relation
            $table->integer('user_id'); // for user_id in users table
            $table->integer('role_id'); // for role_id in role table
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('role_users');
    }
};
