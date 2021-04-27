<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($course) {
    //         $course->slug = Str::slug($course->title);
    //     });
    // }

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

    public function getSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
