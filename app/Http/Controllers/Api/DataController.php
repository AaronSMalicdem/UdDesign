<?php

namespace App\Http\Controllers\Api;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expense;

class DataController extends Controller
{
    public function retrieveSales() {

        // $get_report = Report::orderBy('created_at', 'DESC')->get();
        $get_report = Sales::orderBy('created_at')->get();

        $data = [];

        foreach ($get_report as $report) {
            array_push($data, [
                'category'=>$report->categoty,
                'product'=>$report->product,
                'gcash' => $report->gcash,
                'cash' => $report->cash,
                'total_sales' => $report->total_sales,
                'date' => $report->date,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
 
    public function retrieveExpenses() {

        // $get_report = Report::orderBy('created_at', 'DESC')->get();
        $get_report = Expense::orderBy('created_at')->get();

        $data = [];

        foreach ($get_report as $report) {
            array_push($data, [
                'category'=>$report->categoty,
                'product'=>$report->product,
                'total_expenses' => $report->total_expenses,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
