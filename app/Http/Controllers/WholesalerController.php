<?php

namespace App\Http\Controllers;

use App\Models\Wholesaler;

class WholesalerController extends Controller
{
    public function index()
    {
        $wholesalers = Wholesaler::all();

    }

}
