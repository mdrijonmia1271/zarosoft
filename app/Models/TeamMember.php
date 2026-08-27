<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

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
}
