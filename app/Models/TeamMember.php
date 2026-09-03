<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'name',
        'designation',
        'role_title',
        'bio',
        'avatar',
        'email',
        'phone',
        'linkedin_url',
        'github_url',
        'twitter_url',
        'skills',
        'is_founder',
        'order',
        'is_active',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_founder' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Resolve the stored avatar to a usable URL. Accepts an absolute URL
     * (external CDN) or a path relative to public/ (locally hosted portrait).
     * Returns null when no avatar is set so views can fall back to initials.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->avatar);
    }

    /**
     * Up to two initials, used when no portrait is available.
     */
    public function getInitialsAttribute(): string
    {
        $parts = preg_split('/\s+/', trim($this->name), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $parts = array_slice($parts, 0, 2);

        return Str::upper(implode('', array_map(fn ($part) => Str::substr($part, 0, 1), $parts)));
    }
}
