<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JunkshopRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'junkshop_id',
        'name',
        'price',
        'unit'
    ];

    public function junkshop(): BelongsTo
    {
        return $this->belongsTo(Junkshop::class);
    }
}
