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

    /**
     * Get the employee's actual pin (strip the first digit).
     */
    public function getRealPinAttribute()
    {
        return substr($this->pin, 1);
    }

    /**
     * Custom relationship to Employee model via derived real_pin.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'real_pin', 'pin');
    }
}
