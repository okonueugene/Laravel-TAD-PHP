<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'pin',
        'datetime',
        'verified',
        'status',
        'work_code',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'pin', 'pin');
    }

    
}
