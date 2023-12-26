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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slogan');
            $table->longText('description');
            $table->string('main_photo');
            $table->string('video');
            $table->string('area');
            $table->string('government');
            $table->string('location_title');
            $table->string('location_google_map',1000);
            $table->string('units_number');
            $table->string('init_unit_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
