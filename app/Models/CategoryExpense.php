<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryExpense extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'categories_expense';


    protected $fillable = ["description", "pourcentage"];
}
