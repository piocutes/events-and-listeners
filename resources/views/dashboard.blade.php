<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
    
            @if (session('error'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                class="ml-4 p-2 text-red-500 bg-red-200 dark:bg-red-900 dark:text-red-400 rounded-md transition-opacity duration-500">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </x-slot>
    
 
    <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}!</h2>
        <div class="row">
            @php
                $products = [
                    ['name' => 'BERRY BLISS', 'image' => 'cupcake-one.webp'],
                    ['name' => 'CHOCO CRAZE', 'image' => 'cupcake-two.webp'],
                    ['name' => 'MOCHA MADNESS', 'image' => 'cupcake-three.jpg']
                ];
            @endphp
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $product['image']) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <a href="{{ route('customize', ['product' => $product['name']]) }}" class="btn btn-primary">Order</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
