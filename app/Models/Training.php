<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Training extends Model
{
    protected $fillable = [
        'training_name',
        'start_date',
        'end_date',
        'organizer',
        'venue',
        'participant_count',
        'event_notes',
        'funding_source',
        'budget_year',
        'execution_status',
        'approval_status',
        'approval_notes',
        'approval_decided_by',
        'approval_decided_at',
        'delay_reason',
        'rescheduled_date',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'rescheduled_date' => 'date',
            'approval_decided_at' => 'datetime',
            'participant_count' => 'integer',
            'budget_year' => 'integer',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(TrainingDocument::class);
    }

    public function approvalDecider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approval_decided_by');
    }
}