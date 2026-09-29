<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'service_category_id',
        'title',
        'slug',
        'icon',
        'image',
        'gallery',
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
        'gallery' => 'array',
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

    /**
     * The lead photo, falling back to the first gallery shot so a service with
     * only extra images still renders one.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->image) ?? $this->gallery_urls->first();
    }

    /**
     * The extra shots attached to the service, resolved for the browser.
     *
     * @return Collection<int, string>
     */
    public function getGalleryUrlsAttribute(): Collection
    {
        return collect($this->gallery ?? [])
            ->map(fn ($path) => $this->resolveMediaPath($path))
            ->filter()
            ->values();
    }

    /**
     * Lead photo first, then the rest of the gallery — the order the slideshows
     * (home hero, service detail) walk through.
     *
     * @return Collection<int, string>
     */
    public function getShowcaseImagesAttribute(): Collection
    {
        return collect([$this->resolveMediaPath($this->image)])
            ->concat($this->gallery_urls)
            ->filter()
            ->unique()
            ->values();
    }
}
