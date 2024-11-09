@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Expense</h2>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="" disabled selected>Select Category</option>
                <option value="OfficeUse">Office Use</option>
                <option value="Ads">Ads</option>
                <option value="Maintenance">Maintenance</option>
                <option value="PrintSup">Print Supplies</option>
                <option value="PackSup">Packing Supplies</option>
                <option value="Stocks">Stocks</option>
                <option value="CustomSup">Custom Supplies</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="form-group">
            <label for="product">Product</label>
            <input type="text" name="product" id="product" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_expenses">Total Expenses</label>
            <input type="number" name="total_expenses" id="total_expenses" class="form-control" required step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Save Expense</button>
    </form>
</div>
@endsection
