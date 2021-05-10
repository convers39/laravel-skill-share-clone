<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'slug',
        'desc',
        'category_id',
        'cover_img',
        'published',
        'tags',
        'video_count',
        'save_count',
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function isSavedBy(User $user)
    {
        return $this->bookmarks->contains('user_id', $user->id);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    // public function getSlugAttribute()
    // {
    //     return Str::slug($this->title);
    // }

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

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
