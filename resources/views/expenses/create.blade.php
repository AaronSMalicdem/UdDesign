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
                <option value="OfficeUse">Office Use Supplies</option>
                <option value="Ads">Mark & Ads</option>
                <option value="Maintenance">Equipment/Maintenance</option>
                <option value="PrintSup">Print Supplies</option>
                <option value="PackSup">Packing Supplies</option>
                <option value="Stocks">Merch. Stocks</option>
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
        <div class="form-group">
            <label for="print_photo">Total Expenses</label>
            <input type="number" name="print_photo" id="print_photo" class="form-control" required step="0.01">
        </div>
        <div class="form-group">
            <label for="udd_merch">Total Expenses</label>
            <input type="number" name="udd_merch" id="udd_merch" class="form-control" required step="0.01">
        </div>
        <div class="form-group">
            <label for="custom_deals">Total Expenses</label>
            <input type="number" name="custom_deals" id="custom_deals" class="form-control" required step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Save Expense</button>
    </form>
</div>
@endsection
