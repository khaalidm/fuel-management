<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Retailer extends Model

{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'ulp_93',
        'ulp_95',
        'diesel',
        'ulp_93_tank',
        'ulp_95_tank',
        'diesel_tank',
        'ulp_93_demand_per_day',
        'ulp_95_demand_per_day',
        'diesel_demand_per_day',
    ];

//    public function retailer() : HasMany
//    {
////        return $this->hasMany(Orders)
//    }
}
