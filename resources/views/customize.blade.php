<x-app-layout>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/' . strtolower(str_replace(' ', '_', $product)) . '.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $product }}</h5>
                <p>Price: Php 40.00</p>
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="{{ $product }}">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                    <p>Total Price: <span id="total">Php 40.00</span></p>
                    <button type="submit" class="btn btn-success">Check Out</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            let total = this.value * 40;
            document.getElementById('total').innerText = 'Php ' + total.toFixed(2);
        });
    </script>

</x-app-layout>