<?php

namespace App\Http\Controllers;

use App\Models\Truck;

class TruckController extends Controller
{
    public function index()
    {
        return response ([

            'trucks' => Truck::with('compartments')->get()->all()
        ]);
    }

}
