<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    protected $fillable = [
        'retailer_id',
        'truck_id',
        'ulp_93',
        'ulp_95',
        'diesel',
        'compartments',
        'status',
        'delivery_date',
        'delivered_at',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'compartments' => 'array',
        'delivery_date' => 'datetime'
    ];

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}

