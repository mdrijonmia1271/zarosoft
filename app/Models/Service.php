<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category_id',
        'title',
        'slug',
        'icon',
        'badge',
        'short_description',
        'description',
        'features',
        'tech_stack',
        'benefits',
        'process_steps',
        'deliverables',
        'is_featured',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'benefits' => 'array',
        'process_steps' => 'array',
        'deliverables' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
