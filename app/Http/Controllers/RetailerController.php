<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Client\Request;

class RetailerController extends Controller
{
public function get()
    {
        return response ([
            'retailers' => Retailer::all()
        ]);
    }

}
