<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finance extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'type',
        'client_id',
        'vacancy_id',
        'amount',
        'category',
        'note',
        'date'
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string, date: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'date' => 'date',
        ];
    }

    /**
     * Summary of client
     * @return BelongsTo<Client, Finance>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(related: Client::class, foreignKey: 'client_id');
    }

    /**
     * Summary of vacancy
     * @return BelongsTo<Vacancy, Finance>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(related: Vacancy::class, foreignKey: 'vacancy_id');
    }
}
