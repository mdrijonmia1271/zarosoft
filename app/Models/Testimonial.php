<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'client_name',
        'client_position',
        'company',
        'location',
        'avatar',
        'rating',
        'quote',
        'project_title',
        'is_featured',
        'order',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getAvatarUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->avatar);
    }

    /**
     * Up to two initials, used when no client photo is available.
     */
    public function getInitialsAttribute(): string
    {
        $name = preg_replace('/^(Engr\.|Dr\.|Mr\.|Ms\.|Mrs\.)\s*/i', '', trim((string) $this->client_name));
        $parts = preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return Str::upper(implode('', array_map(
            fn ($part) => Str::substr($part, 0, 1),
            array_slice($parts, 0, 2)
        )));
    }
}
