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
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('industry')->nullable();
            $table->string('duration')->nullable();
            $table->text('tagline')->nullable();
            $table->text('overview');
            $table->longText('problem')->nullable();
            $table->longText('solution')->nullable();
            $table->json('key_features')->nullable();
            $table->json('tech_stack')->nullable();
            $table->json('results')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('hero_image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_categories');
    }
};
