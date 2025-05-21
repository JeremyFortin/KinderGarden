<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["name", "firstName", "birthdate", "address", "city", "state_id", "phone"];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
