<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'views',
        'summary',
        'url',
        'is_visible'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
