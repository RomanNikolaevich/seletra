<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'description',
        'category_id',
        'type_id',
        'status_id',
        'favorites',
        'user_id',
        'completion_at',
    ];

    protected $casts = ['favorites' => 'boolean'];

    public function courseCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id');
    }

    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class, 'type_id', 'id');
    }

    public function courseStatus(): BelongsTo
    {
        return $this->belongsTo(CourseStatus::class, 'status_id', 'id');
    }

    public function courseSubcategories(): BelongsToMany
    {
        return $this->belongsToMany(
            CourseSubcategory::class, 'course_subcategories_pivot', 'course_id', 'subcategory_id', 'id');
    }
}
