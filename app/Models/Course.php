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
        'status',
        'completion_at',
        'category',
        'type',
    ];

    protected $casts = ['favorites' => 'boolean'];

    public function courseCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'category', 'id');
    }

    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class, 'type', 'id');
    }

    public function courseStatus(): BelongsTo
    {
        return $this->belongsTo(CourseStatus::class, 'status', 'id');
    }

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(
            CourseSubcategory::class, 'course_category_subcategory', 'course_id', 'subcategory_id');
    }
}
