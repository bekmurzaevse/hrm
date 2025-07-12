<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'test_id',
        'user_id',
        'score',
        'taken_at',
    ];

    protected function casts(): array
    {
        return [
            'taken_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->hasOneThrough(
            Course::class,  
            Test::class,    
            'id',         
            'id',         
            'test_id',      // TestResult modeldegi foreign key (test_id)
            'course_id'     // Test modeldegi foreign key (course_id)
        );
    }
}
