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
        Schema::create('departments', function (Blueprint $table) {
            $table->id()->AutoIncrement();
            $table->string('department_name');
            $table->timestamps();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->nullable();
            $table->foreign('manager_id')->references('id')->on('users')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
