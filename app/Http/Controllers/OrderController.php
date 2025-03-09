<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Events\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function customize($product) {
        return view('customize', compact('product'));
    }

    public function store(Request $request) {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $price = 40;
        $total = $request->quantity * $price;

        Order::create([
            'user_id' => Auth::id(),
            'product_name' => $request->product,
            'quantity' => $request->quantity,
            'total_price' => $total
        ]);
        
        $order = Order::find(1);
        event(new OrderPlaced($order)); 

        return redirect()->route('dashboard')->with('success', 'Order placed successfully');
    }
}

