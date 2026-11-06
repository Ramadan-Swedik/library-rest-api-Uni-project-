<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role'
    ];

    // 1. Hide password from all JSON responses
    protected $hidden = [
        'password',
    ];
    // 2. Automatically hash password whenever it is created or updated
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
