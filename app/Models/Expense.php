<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    // Define the fillable attributes to allow mass assignment
   protected $fillable = [
        'category',
        'product',
        'total_expenses',
    ];
}
