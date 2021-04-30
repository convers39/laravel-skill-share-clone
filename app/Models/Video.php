<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model
{
    use HasFactory;
    // use InteractsWithMedia;

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
