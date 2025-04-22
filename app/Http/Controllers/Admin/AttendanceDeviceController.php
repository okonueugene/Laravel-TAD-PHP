<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
class AttendanceDeviceController extends Controller
{
    public function index()
    {
        try {
            $tad        = app('tad');
            $attendance = $tad->get_att_log()->to_array()['Row'] ?? [];

            //add paginator
            $perPage       = 10;
            $page          = request()->get('page', 1);
            $paginatedRows = new \Illuminate\Pagination\LengthAwarePaginator(
                $attendance,
                count($attendance),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
            $title = 'Attendance';

            return view('admin.attendance.index', compact('paginatedRows', 'title'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function monthlyAttendance()
    {
        $currentMonth = now()->month;
        $currentYear  = now()->year;


        $attendances = Attendance::whereMonth('datetime', $currentMonth)
            ->whereYear('datetime', $currentYear)
            ->get();

        $grouped = $attendances->groupBy(function ($record) {
            return substr($record->pin, 1); // strip prefix (get real pin)
        })->map(function ($records, $realPin) {
            $employee = Employee::where('pin', $realPin)->first();

            return [
                'pin'          => $realPin,
                'name'         => $employee?->empname ?? 'Unknown',
                'occupation'   => $employee?->empoccupation ?? '-',
                'team'         => $employee?->team ?? '-',
                'days_present' => $records->unique(fn($r) => date('Y-m-d', strtotime($r->datetime)))->count(),
                'work_days'    => $this->getBusinessDaysInMonth(now()->year, now()->month),
            ];
        })->values();

        $perPage   = 10;
        $page      = request()->get('page', 1);
        $paginated = new LengthAwarePaginator(
            $grouped->forPage($page, $perPage),
            $grouped->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.attendance.monthly', ['employees' => $paginated]);
    }

    private function getBusinessDaysInMonth($year, $month): int
    {
        $start        = Carbon::create($year, $month, 1);
        $end          = $start->copy()->endOfMonth();
        $businessDays = 0;

        while ($start <= $end) {
            if ($start->isWeekday()) {
                $businessDays++;
            }
            $start->addDay();
        }

        return $businessDays;
    }

    public function employeeAttendanceDetails($pin)
    {
        try {
            $currentMonth = now()->month;
            $currentYear  = now()->year;

            $employee = Employee::where('pin', $pin)->firstOrFail();

            $attendances = Attendance::whereIn('pin', ['1' . $pin, '2' . $pin])
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
