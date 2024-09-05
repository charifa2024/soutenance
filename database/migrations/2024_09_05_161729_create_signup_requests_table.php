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
        Schema::create('signup_requests', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('email')->unique();
            $table->string('password')->hash();
            $table->string('phoneNumber');
            $table->string('post');
            $table->string('department');
            $table->string('role')->enum(['manager', 'employee']);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signup_requests');
    }
};
