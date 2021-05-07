<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserProfile;
use App\Models\Course;
use App\Models\Video;

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

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, Course::class);
    }
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
}
