<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;


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
    public function save(array $options = [])
    {
        // add slug on save

        return parent::save();
    }


    public function getSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
