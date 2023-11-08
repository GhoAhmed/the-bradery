<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrders()
    {
        try {
            $orders = Order::where('user_id', auth()->id())->get();
            return response()->json(['orders' => $orders]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est produite lors de la récupération des commandes.'], 500);
        }
    }
}
