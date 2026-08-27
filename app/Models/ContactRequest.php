<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'phone',
        'company',
        'service_interest',
        'budget_range',
        'message',
        'attachment_path',
        'attachment_original_name',
        'status',
        'admin_notes',
        'ip_address',
        'contacted_at',
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($request) {
            if (empty($request->ticket_number)) {
                $request->ticket_number = 'ZS-' . strtoupper(Str::random(4)) . '-' . rand(1000, 9999);
            }
        });
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'new' => 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20',
            'contacted' => 'bg-blue-500/10 text-blue-400 border border-blue-500/20',
            'discussion' => 'bg-amber-500/10 text-amber-400 border border-amber-500/20',
            'proposal' => 'bg-purple-500/10 text-purple-400 border border-purple-500/20',
            'won' => 'bg-green-500/20 text-green-300 border border-green-500/30',
            'lost' => 'bg-rose-500/10 text-rose-400 border border-rose-500/20',
            default => 'bg-slate-500/10 text-slate-400 border border-slate-500/20',
        };
    }
}
