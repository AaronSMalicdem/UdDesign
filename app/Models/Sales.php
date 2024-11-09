<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'category', 
        'product', 
        'gcash', 
        'cash', 
        'total_sales'
    ];
}
