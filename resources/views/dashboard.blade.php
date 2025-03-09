<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}!</h2>
        <div class="row">
            @php
                $products = [
                    ['name' => 'BERRY BLISS', 'image' => 'berry_bliss.jpg'],
                    ['name' => 'CHOCO CRAZE', 'image' => 'choco_craze.jpg'],
                    ['name' => 'MOCHA MADNESS', 'image' => 'mocha_madness.jpg']
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
