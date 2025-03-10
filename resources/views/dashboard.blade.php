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

    <style>
            /* Reset box sizing for all elements */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* General Styles */
        .index {
            background-color: #ffffff;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Welcome Section */
        .logo {
            margin: 0px auto 120px auto;
            width: 150px;
            height: auto;
        }

        .welcome-background {
            background: #c5cdfa;
            width: 100%;
            padding: 3rem 0;
            text-align: center;
        }

        .welcome-text {
            color: rgba(199, 27, 73, 0.85);
            font-family: "Montserrat-ExtraBoldItalic", sans-serif;
            line-height: 75px;
        }

        .welcome-text-span {
            font-size: 6rem;
            font-weight: 800;
            color: black;
            font-style: italic;
        }

        .welcome-text-span2 {
            font-size: 8rem;
            font-weight: 800;
        }

        /* Best Seller Section */
        .best-sellers-container {
            width: 100%;
            max-width: 1440px;
            text-align: center;
            margin-top: 2rem;
            background-image: url('/images/best-sellers.webp');
            background-size: cover; 
            background-position: center;
        }

        .best-seller-title {
            font-family: "Montserrat-SemiBold", sans-serif;
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .best-seller-paragraph {
            font-family: "Montserrat-Regular", sans-serif;
            font-size: 1.25rem;
            font-weight: 400;
            color: #000000;
            margin-bottom: 3rem;
        }

        /* Grid Layout for Products */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            width: 100%;
            margin: 50px auto;
        }

        .product-card {
            background: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-info {
            padding: 1rem;
            text-align: center;
        }

        .product-name {
            font-family: "Montserrat-Bold", sans-serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .order-button {
            background: #e3b63a;
            color: #000000;
            padding: 1rem 2rem;
            font-size: 1.25rem;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .order-button:hover {
            background: #d29c33;
        }

    </style>

    <div class="index">
        <!-- Welcome Section -->
        <div class="welcome-background">
            <img class="logo" src="{{ asset('images/logo.png') }}"/>
            <div class="welcome-text">
                <span>
                    <span class="welcome-text-span">
                        WELCOME TO
                        <br />
                    </span>
                    <span class="welcome-text-span2">CUPCAKE BLISS</span>
                </span>
            </div> 
        </div>

        <!-- Best Seller Section -->
        <div class="best-sellers-container">
            <div class="best-seller-title">
                <h3>BEST SELLERS!</h3>
            </div>
            <div class="best-seller-paragraph">
                "We’re excited to share with you our collection of best-selling
                cupcakes. These are the flavors that have earned rave reviews and become
                customer favorites, so you’re in for a treat no matter which one you
                choose!"
            </div>

            <div class="product-grid">
                @php
                    $products = [
                        ['name' => 'BERRY BLISS', 'image' => 'cupcake-one.webp'],
                        ['name' => 'CHOCO CRAZE', 'image' => 'cupcake-two.webp'],
                        ['name' => 'MOCHA MADNESS', 'image' => 'cupcake-three.jpg']
                    ];
                @endphp
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('images/' . $product['image']) }}" class="product-image" alt="{{ $product['name'] }}">
                        <div class="product-info">
                            <h4 class="product-name">{{ $product['name'] }}</h4>
                            <a href="{{ route('customize', ['product' => $product['name']]) }}" class="order-button">ORDER</a>
                        </div>
                    </div>
                @endforeach
        </div>
</x-app-layout>
