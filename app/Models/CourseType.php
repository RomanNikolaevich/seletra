<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseType extends Model
{
    protected $fillable = [
        'name_en',
        'name_ua',
        'description_en',
        'description_ua',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'type');
    }
}
