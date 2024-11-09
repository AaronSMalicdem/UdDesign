@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">{{ isset($sale) ? 'Edit Sale' : 'Create Sale' }}</h1>

        <form action="{{ isset($sale) ? route('sales.update', $sale->id) : route('sales.store') }}" method="POST">
            @csrf
            @if(isset($sale))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category" class="form-select" onchange="updateProductOptions()" required>
                    <option value="Merch" {{ isset($sale) && $sale->category == 'Merch' ? 'selected' : '' }}>Merch</option>
                    <option value="Print" {{ isset($sale) && $sale->category == 'Print' ? 'selected' : '' }}>Print</option>
                    <option value="Deals" {{ isset($sale) && $sale->category == 'Deals' ? 'selected' : '' }}>Deals</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <select id="product" name="product" class="form-select" required>
                    <!-- Options will be updated based on the selected category -->
                </select>
            </div>

            <div class="mb-3">
                <label for="gcash" class="form-label">Gcash</label>
                <input type="number" step="0.01" id="gcash" name="gcash" class="form-control" value="{{ $sale->gcash ?? old('gcash') }}">
            </div>

            <div class="mb-3">
                <label for="cash" class="form-label">Cash</label>
                <input type="number" step="0.01" id="cash" name="cash" class="form-control" value="{{ $sale->cash ?? old('cash') }}">
            </div>

            <div class="mb-3">
                <label for="total_sales" class="form-label">Total Sales</label>
                <input type="number" step="0.01" id="total_sales" name="total_sales" class="form-control" value="{{ $sale->total_sales ?? old('total_sales') }}" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">{{ isset($sale) ? 'Update Sale' : 'Save Sale' }}</button>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        function updateProductOptions() {
            const category = document.getElementById('category').value;
            const productSelect = document.getElementById('product');
            let options = [];

            switch (category) {
                case 'Merch':
                    options = ['Tote Bag', 'Mug', 'Umbrella', 'Book', 'Hoodie', 'Jacket', 'Tshirt'];
                    break;
                case 'Print':
                    options = ['Print', 'Photocopy'];
                    break;
                case 'Deals':
                    options = ['Projects', 'Custom Merch'];
                    break;
            }

            // Clear previous options
            productSelect.innerHTML = '';

            // Add new options
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.textContent = option;
                productSelect.appendChild(opt);
            });

            // Set default product if editing
            @if(isset($sale))
                const currentProduct = "{{ $sale->product }}";
                productSelect.value = currentProduct;
            @endif
        }

        document.addEventListener("DOMContentLoaded", updateProductOptions);
    </script>
@endsection
