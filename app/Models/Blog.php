<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'author_name',
        'author_avatar',
        'read_time',
        'is_featured',
        'is_published',
        'published_at',
        'views_count',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if (empty($blog->published_at) && $blog->is_published) {
                $blog->published_at = now();
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->cover_image);
    }

    public function getAuthorAvatarUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->author_avatar);
    }

    /**
     * Up to two initials for the author, used when no avatar is available.
     */
    public function getAuthorInitialsAttribute(): string
    {
        $parts = preg_split('/\s+/', trim((string) $this->author_name), -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return Str::upper(implode('', array_map(
            fn ($part) => Str::substr($part, 0, 1),
            array_slice($parts, 0, 2)
        )));
    }
}
