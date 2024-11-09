<?php
namespace App\Http\Controllers;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'product' => 'required',
            'gcash' => 'nullable|numeric',
            'cash' => 'nullable|numeric',
            'total_sales' => 'required|numeric',
        ]);

        Sales::create($validatedData);
        return redirect()->route('sales.index')->with('success', 'Sale record created successfully');
    }

    public function edit(Sales $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sales $sale)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'product' => 'required',
            'gcash' => 'nullable|numeric',
            'cash' => 'nullable|numeric',
            'total_sales' => 'required|numeric',
        ]);

        $sale->update($validatedData);
        return redirect()->route('sales.index')->with('success', 'Sale record updated successfully');
    }

    public function destroy(Sales $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale record deleted successfully');
    }
}
