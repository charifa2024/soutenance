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
            $table->string('email');
            $table->string('password')->hash();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->nullable();
            $table->string('role')->enum(['Manager', 'Employee','Admin']);
            $table->string('status')->default('pending');
            $table->foreign('admin_id')->references('id')->on('users')->nullable();

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
