<?php
namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdmin implements ShouldQueue
{
    public function handle(OrderPlaced $event)
    {
        \Log::info("New Order Received", [
            'User' => $event->order->user->name,
            'Product' => $event->order->product_name,
            'Quantity' => $event->order->quantity,
            'Total Price' => $event->order->total_price,
            'Date' => $event->order->created_at,
        ]);
    }
}
