<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
        // return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent()
    {
        return $this->belongsTo(self::class)->with('parent');
    }

    // only direct children categories
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // get all descendant categories recursively
    public function descendants()
    {
        return $this->hasMany(self::class, 'parent_id')->with('descendants');
    }
}
