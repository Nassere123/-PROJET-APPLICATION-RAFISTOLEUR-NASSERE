<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rafistoleur_id' => 'required|exists:rafistoleurs,id',
            'description' => 'required|string',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order, 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'description' => 'string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return response()->json($order, 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted'], 200);
    }
}
