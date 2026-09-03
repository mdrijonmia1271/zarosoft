<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;
    use ResolvesMediaPath;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'website_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($client) {
            if (empty($client->slug)) {
                $client->slug = Str::slug($client->name);
            }
        });
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->resolveMediaPath($this->logo);
    }
}
