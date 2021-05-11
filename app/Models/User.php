<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserProfile;
use App\Models\Course;
use App\Models\Video;
use App\Models\Comment;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_teacher',
        'saved_course'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'saved_course' => 'array',
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
        // return $this->belongsToMany(Course::class, 'bookmarks')->withTimestamps();
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, Course::class);
    }

    /**
     * Get all of the user's comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
