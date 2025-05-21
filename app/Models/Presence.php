<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["presence_date", "kid_id", "teacher_id"];

    public function kid()
    {
        return $this->belongsTo(Kid::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
