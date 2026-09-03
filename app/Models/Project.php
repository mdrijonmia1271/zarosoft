<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'project_category_id',
        'title',
        'slug',
        'client_name',
        'industry',
        'duration',
        'tagline',
        'overview',
        'problem',
        'solution',
        'key_features',
        'tech_stack',
        'results',
        'thumbnail',
        'hero_image',
        'gallery',
        'live_url',
        'github_url',
        'is_featured',
        'order',
        'is_active',
    ];

    protected $casts = [
        'key_features' => 'array',
        'tech_stack' => 'array',
        'results' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->thumbnail);
    }

    /**
     * Falls back to the thumbnail so a project without a dedicated hero shot
     * still renders a banner.
     */
    public function getHeroUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->hero_image) ?? $this->thumbnail_url;
    }
}
