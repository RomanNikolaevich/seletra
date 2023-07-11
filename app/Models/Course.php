<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'description',
        'status',
        'completion_at',
        'category'
    ];

    protected $casts = ['favorites' => 'boolean'];

    public function courseCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class, 'type', 'id');
    }

    public function courseStatus(): BelongsTo
    {
        return $this->belongsTo(CourseStatus::class, 'status', 'id');
    }
}
