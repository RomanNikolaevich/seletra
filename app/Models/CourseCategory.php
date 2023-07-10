<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = [
        'name_en',
        'name_uk',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
