<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickname',
        'age',
        'city',
        'gender',
        'about_me',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
