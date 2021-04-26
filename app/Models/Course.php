<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'cover_img',
        'published',
        'tags',
        'video_count',
        'save_count',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
