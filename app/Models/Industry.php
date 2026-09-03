<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'headline',
        'summary',
        'features',
        'accent',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /** Accent names an editor can choose from, mapped to gradient classes. */
    public const ACCENTS = [
        'blue' => 'from-blue-600 to-indigo-600',
        'purple' => 'from-purple-600 to-pink-600',
        'emerald' => 'from-emerald-600 to-teal-600',
        'amber' => 'from-amber-500 to-orange-600',
        'cyan' => 'from-cyan-600 to-blue-600',
        'rose' => 'from-rose-600 to-red-600',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($industry) {
            if (empty($industry->slug)) {
                $industry->slug = Str::slug($industry->name);
            }
        });
    }

    public function getGradientAttribute(): string
    {
        return self::ACCENTS[$this->accent] ?? self::ACCENTS['blue'];
    }
}
