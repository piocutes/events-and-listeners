<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>
        
    <div class="container">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Php {{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>