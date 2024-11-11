<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'product' => 'required',
            'total_expenses' => 'required|numeric|min:0',
            'print_photo',
            'udd_merch',
            'custom_deals',
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'product' => 'required',
            'total_expenses' => 'required|numeric|min:0',
            'print_photo',
            'udd_merch',
            'custom_deals',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
