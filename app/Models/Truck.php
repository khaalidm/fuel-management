<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'wholesaler_id',
        'registration',
        'status',
        'total_capacity',
        'created_at',
        'deleted_at'
    ];


    protected $appends = ['total_capacity'];

    public function compartments() : HasMany
    {
        return $this->hasMany(Compartment::class);
    }

    // computed property that returns the total capacity of the truck
    public function getTotalCapacityAttribute()
    {
        return $this->compartments->sum('capacity');
    }

}
