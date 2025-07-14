<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseAssignments()
    {
        return $this->hasMany(CourseAssignment::class);
    }

    /**
     * Summary of clients
     * @return HasMany<Client, User>
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    /**
     * Summary of interactions
     * @return HasMany<Interaction, User>
     */
    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    /**
     * Summary of vacancies
     * @return HasMany<Vacancy, User>
     */
    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }

    /**
     * Summary of projects
     * @return HasMany<Project, User>
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    // /**
    //  * Summary of hrDocuments
    //  * @return HasMany<HrDocument, User>
    //  */
    // public function hrDocuments(): HasMany
    // {
    //     return $this->hasMany(HrDocument::class);
    // }

    /**
     * Summary of hrOrders
     * @return HasMany<HrOrder, User>
     */
    public function hrOrders(): HasMany
    {
        return $this->hasMany(HrOrder::class);
    }

    public function testResults(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }

    public function candidateNotes(): HasMany
    {
        return $this->hasMany(CandidateNote::class);
    }

    /**
     * Summary of hrDocuments
     * @return MorphMany<File, User>
     */
    public function hrDocuments(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')->where('type', 'hr_document');
    }

}
