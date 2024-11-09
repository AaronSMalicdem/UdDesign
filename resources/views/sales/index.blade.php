@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Sales Records</h1>
        <div class="text-end mb-3">
            <a href="{{ route('sales.create') }}" class="btn btn-primary">Add New Sale</a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Gcash</th>
                    <th>Cash</th>
                    <th>Total Sales</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->category }}</td>
                        <td>{{ $sale->product }}</td>
                        <td>{{ $sale->gcash ?? '-' }}</td>
                        <td>{{ $sale->cash ?? '-' }}</td>
                        <td>{{ $sale->total_sales }}</td>
                        <td class="d-flex">
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
