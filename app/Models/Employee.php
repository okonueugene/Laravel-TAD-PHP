<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'pin',
        'empname',
        'empgender',
        'empoccupation',
        'empphone',
        'empresidence',
        'team',
        'status',
        'acc_no',
    ];

    /**
     * Clock-in attendances (prefix 1).
     */
    public function clockIns()
    {
        return $this->hasMany(Attendance::class, 'pin', 'pin')
            ->whereRaw("LEFT(pin, 1) = '1'")
            ->whereColumn('employees.pin', '=', \DB::raw("SUBSTRING(attendances.pin, 2)"));
    }

    /**
     * Clock-out attendances (prefix 2).
     */
    public function clockOuts()
    {
        return $this->hasMany(Attendance::class, 'pin', 'pin')
            ->whereRaw("LEFT(pin, 1) = '2'")
            ->whereColumn('employees.pin', '=', \DB::raw("SUBSTRING(attendances.pin, 2)"));
    }

    /**
     * Get all attendances via manual filtering (for flexibility).
     */
    public function getAttendancesAttribute()
    {
        return Attendance::whereRaw("SUBSTRING(pin, 2) = ?", [$this->pin])->get();
    }
}

