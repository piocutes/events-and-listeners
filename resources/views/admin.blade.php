<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Notifications') }}
            </h2>
    
            @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                class="ml-4 p-2 text-green-600 bg-green-200 dark:bg-green-900 dark:text-green-400  transition-opacity duration-500">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </x-slot>
     
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Order Summary</h3>
            
            <table class="min-w-full bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 overflow-hidden">
                <thead>
                    <tr class="text-left border-b-2 border-gray-200 dark:border-gray-700">
                        <th class="py-2 px-4 text-sm font-medium bg-gray-100 dark:bg-gray-900">User</th>
                        <th class="py-2 px-4 text-sm font-medium bg-gray-100 dark:bg-gray-900">Product</th>
                        <th class="py-2 px-4 text-sm font-medium bg-gray-100 dark:bg-gray-900">Quantity</th>
                        <th class="py-2 px-4 text-sm font-medium bg-gray-100 dark:bg-gray-900">Total Price</th>
                        <th class="py-2 px-4 text-sm font-medium bg-gray-100 dark:bg-gray-900">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                        <td class="py-3 px-4 text-sm">{{ $order->user->name }}</td>
                        <td class="py-3 px-4 text-sm">{{ $order->product_name }}</td>
                        <td class="py-3 px-4 text-sm">{{ $order->quantity }}</td>
                        <td class="py-3 px-4 text-sm">Php {{ number_format($order->total_price, 2) }}</td>
                        <td class="py-3 px-4 text-sm">{{ $order->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <style>
        .container {
            max-width: 100%;
            margin: 0 auto;
            border-radius: 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
        }

        th {
            background-color: #f7fafc;
            font-weight: 600;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr {
            transition: background-color 0.3s ease;
        }

        .success-message {
            animation: fadeOut 3s ease-out;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</x-app-layout>
