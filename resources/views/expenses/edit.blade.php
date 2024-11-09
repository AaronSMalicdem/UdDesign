@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Expense</h2>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="OfficeUse" {{ $expense->category == 'OfficeUse' ? 'selected' : '' }}>Office Use</option>
                <option value="Ads" {{ $expense->category == 'Ads' ? 'selected' : '' }}>Ads</option>
                <option value="Maintenance" {{ $expense->category == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                <option value="PrintSup" {{ $expense->category == 'PrintSup' ? 'selected' : '' }}>Print Supplies</option>
                <option value="PackSup" {{ $expense->category == 'PackSup' ? 'selected' : '' }}>Packing Supplies</option>
                <option value="Stocks" {{ $expense->category == 'Stocks' ? 'selected' : '' }}>Stocks</option>
                <option value="CustomSup" {{ $expense->category == 'CustomSup' ? 'selected' : '' }}>Custom Supplies</option>
                <option value="Others" {{ $expense->category == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
        </div>
        <div class="form-group">
            <label for="product">Product</label>
            <input type="text" name="product" id="product" class="form-control" value="{{ $expense->product }}" required>
        </div>
        <div class="form-group">
            <label for="total_expenses">Total Expenses</label>
            <input type="number" name="total_expenses" id="total_expenses" class="form-control" value="{{ $expense->total_expenses }}" required step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Update Expense</button>
    </form>
</div>
@endsection
