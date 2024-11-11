@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Expenses</h2>
    <a href="{{ route('expenses.create') }}" class="btn btn-success mb-3">Create Expense</a>
    <table class="table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Product</th>
                <th>Total Expenses</th>
                <th>Print/Photo</th>
                <th>UdD Merch</th>
                <th>Custom Deals</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->category }}</td>
                <td>{{ $expense->product }}</td>
                <td>{{ number_format($expense->total_expenses, 2) }}</td>
                <td>{{ number_format($expense->print_photo, 2) }}</td>
                <td>{{ number_format($expense->udd_merch, 2) }}</td>
                <td>{{ number_format($expense->custom_deals, 2) }}</td>
                <td>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
