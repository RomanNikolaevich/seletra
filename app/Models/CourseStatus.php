<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseStatus extends Model
{
    protected $fillable = [
        'name_en',
        'name_ua',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'status_id');
    }
}
