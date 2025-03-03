<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    protected $fillable = [
        'name_en',
        'name_ua',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(CourseSubcategory::class, 'category_id', 'id');
    }

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }
}
