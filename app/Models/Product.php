<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'status',
        'description',
        'highlights',
        'demo_url',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'highlights' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Tailwind classes for the status pill, derived from the status text so
     * the database never has to store presentation details.
     */
    public function getStatusClassesAttribute(): string
    {
        return match (Str::lower($this->status)) {
            'enterprise ready', 'available', 'live' => 'bg-emerald-500/10 text-emerald-600 border-emerald-500/30',
            'beta' => 'bg-blue-500/10 text-blue-600 border-blue-500/30',
            'coming soon' => 'bg-amber-500/10 text-amber-600 border-amber-500/30',
            default => 'bg-slate-500/10 text-slate-600 border-slate-500/30',
        };
    }
}
