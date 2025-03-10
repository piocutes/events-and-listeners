<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product }}</h5>
                <p class="price">Price: Php 40.00</p>
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="{{ $product }}">
                    <div class="quantity-input">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                    </div>
                    <p class="total-price">Total Price: <span id="total">Php 40.00</span></p>
                    <button type="submit" class="btn btn-success">Check Out</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 700px;
            height: 300px;
            border-radius: 0px;
            border: 1px solid #ddd;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
        }

        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
            flex-grow: 1;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .price, .total-price {
            font-size: 1.125rem;
            color: #555;
            margin-bottom: 15px;
        }

        .quantity-input {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            border-radius: 5px;
            padding: 12px;
            font-size: 1.125rem;
            background-color: rgb(218, 176, 38);
        }
    </style>
    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            let total = this.value * 40;
            document.getElementById('total').innerText = 'Php ' + total.toFixed(2);
        });
    </script>
</x-app-layout>
