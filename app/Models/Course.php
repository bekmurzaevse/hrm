<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function createdBy() 
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function courseAssignments()
    {
        return $this->hasMany(CourseAssignment::class);
    }

    public function materials(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')->where('type', 'course_material');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function testResults()
    {
        return $this->hasManyThrough(TestResult::class, Test::class);
    }

}
