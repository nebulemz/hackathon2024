<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'junkshop_id',
        'user_id',
        'status',
        'description',
        'schedule'
    ];

    protected function casts(): array
    {
        return [
            'schedule' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function junkshop(): BelongsTo
    {
        return $this->belongsTo(Junkshop::class);
    }
}
