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
        Schema::create('break_requests', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('pending');
            $table->text('reason');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('break_requests_');
    }
};
