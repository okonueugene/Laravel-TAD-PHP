<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;

class AttendanceDeviceController extends Controller
{
    public function index()
    {
        try {
            $tad        = app('tad');
            $attendance = $tad->get_att_log()->to_array();

            $rows = collect($attendance['Row'] ?? []);

            $currentPage = request()->get('page', 1);
            $perPage = 10;

            $paginatedRows = new LengthAwarePaginator(
                $rows->forPage($currentPage, $perPage),
                $rows->count(),
                $perPage,
                $currentPage,
                ['path' => url()->current()]
            );

            return view('admin.attendance.index', compact('paginatedRows'));
        } catch (\Exception $e) {
            return view('admin.attendance.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
