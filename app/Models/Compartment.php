<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'truck_id',
        'fuel',
        'status',
        'capacity',
        'level',
        'created_at',
        'deleted_at'
    ];

    public function truck() : BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

}
