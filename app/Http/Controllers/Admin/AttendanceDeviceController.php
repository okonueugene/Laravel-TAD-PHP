<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class AttendanceDeviceController extends Controller
{
    public function index()
    {
        try {
            $tad        = app('tad');
            $attendance = $tad->get_all_user_info()->to_array();

            $rows = collect($attendance['Row'] ?? []);

   //convert to array
            $rows = $rows->toArray();
            //return json response
            return response()->json($rows);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function monthlyAttendance()
    {
        $currentMonth = now()->month;
        $currentYear  = now()->year;

        $attendances = Attendance::whereMonth('datetime', $currentMonth)
            ->whereYear('datetime', $currentYear)
            ->get();

        $grouped = $attendances->groupBy('pin')->map(function ($records, $pin) {
            $employee = Employee::where('pin', $pin)->first();

            return [
                'pin'          => $pin,
                'name'         => $employee?->empname ?? 'Unknown',
                'occupation'   => $employee?->empoccupation ?? '-',
                'team'         => $employee?->team ?? '-',
                'days_present' => $records->unique(fn($r) => date('Y-m-d', strtotime($r->datetime)))->count(),
                'work_days'    => now()->daysInMonth,
            ];
        })->values();

        // Paginate manually
        $perPage   = 10;
        $page      = request()->get('page', 1);
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $grouped->forPage($page, $perPage),
            $grouped->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.attendance.monthly', ['employees' => $paginated]);
    }

    public function employeeAttendanceDetails($pin)
    {
        try {
            $currentMonth = now()->month;
            $currentYear  = now()->year;

            $employee = Employee::where('pin', $pin)->firstOrFail();

            $attendances = Attendance::where('pin', $pin)
                ->whereMonth('datetime', $currentMonth)
                ->whereYear('datetime', $currentYear)
                ->orderBy('datetime', 'asc')
                ->get()
                ->groupBy(function ($attendance) {
                    return date('Y-m-d', strtotime($attendance->datetime));
                });

            return view('admin.attendance.employee-details', compact('employee', 'attendances'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
