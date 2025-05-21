<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = ["dateTime", "amount", "nursery_id", "commerce_id", "category_expense_id"];

    public function nursery()
    {
        return $this->belongsTo(Nursery::class);
    }
    public function CategoryExpense()
    {
        return $this->belongsTo(CategoryExpense::class);
    }

    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
