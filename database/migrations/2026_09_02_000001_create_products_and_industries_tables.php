<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Products and industry solutions were previously hardcoded arrays inside
     * their controllers, so they could not be edited from the admin panel.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline');
            $table->string('status')->default('Coming Soon');
            $table->text('description')->nullable();
            $table->json('highlights')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('icon')->default('package');
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->default('layers');
            $table->string('headline');
            $table->text('summary')->nullable();
            $table->json('features')->nullable();
            $table->string('accent')->default('blue');
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
        Schema::dropIfExists('products');
    }
};
