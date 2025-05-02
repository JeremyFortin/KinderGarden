<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryExpense extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'categoriesdepense';


    protected $fillable = ["description", "pourcentage"];

    public function expense()
    {
        return $this->belongsTo(Expense::class, "category_expense_id");
    }
}
