<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return response([
            'orders' => Order::all()
        ]);
    }

    // A function that creates a new order from a request
    public function create(Request $request)
    {
        $order = Order::create($request->all());
        return response([
            'order' => $order
        ]);
    }



}
