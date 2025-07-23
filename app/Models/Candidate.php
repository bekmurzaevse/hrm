<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'education',
        'experience',
        'status',
    ];


    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function notes()
    {
        return $this->hasMany(CandidateNote::class);
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')->where('type', 'candidate_document');
    }

    public function photo(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
