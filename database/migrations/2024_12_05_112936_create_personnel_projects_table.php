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
        Schema::create('personnel_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnel_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('personnel_id')->references('id')->on('personnels');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_projects');
    }
};
