<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
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

    /**
     * Condenses the free-text `results` sentences into value/label pairs for
     * the compact stat rows on project cards: the first token carrying a digit
     * becomes the figure, the words around it become the caption.
     */
    public function getHighlightStatsAttribute(): Collection
    {
        $filler = ['in', 'of', 'on', 'to', 'for', 'the', 'a', 'an', 'and', 'from', 'by', 'with'];

        return collect($this->results ?? [])->take(3)->map(function ($result) use ($filler) {
            $words = preg_split('/\s+/', trim((string) $result), -1, PREG_SPLIT_NO_EMPTY) ?: [];

            if ($words === []) {
                return null;
            }

            $figureIndex = null;
            foreach ($words as $i => $word) {
                if (preg_match('/\d/', $word)) {
                    $figureIndex = $i;
                    break;
                }
            }

            if ($figureIndex === null) {
                $value = $words[0];
                $rest = array_slice($words, 1);
            } else {
                $value = trim($words[$figureIndex], ',.;:');
                $rest = array_slice($words, $figureIndex + 1) ?: array_slice($words, 0, $figureIndex);
            }

            // Trim filler words off both ends so the caption starts on a noun.
            while ($rest && in_array(Str::lower(head($rest)), $filler, true)) {
                array_shift($rest);
            }

            $rest = array_slice($rest, 0, 3);

            while ($rest && in_array(Str::lower(end($rest)), $filler, true)) {
                array_pop($rest);
            }

            return [
                'value' => $value,
                'label' => Str::ucfirst(rtrim(implode(' ', $rest), ',.;:')),
            ];
        })->filter()->values();
    }
}
