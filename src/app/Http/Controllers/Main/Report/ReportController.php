<?php

namespace App\Http\Controllers\Main\Report;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::query()
            ->with(['division'])
            ->select('division_id', DB::raw('DATE(created_at) as created_date'))
            ->groupBy('division_id', DB::raw('DATE(created_at)'))
            ->orderBy('created_date', 'desc')
            ->orderBy(Division::query()->select('title')->whereColumn('divisions.id', '=', 'reports.division_id'))
            ->get();

        if ($reports->isEmpty()) {
            $groupDate[] = [
                'id' => 0,
                'date' => '',
                'title' => '',
            ];
        }

        $dates = array_unique($reports->pluck('created_date')->toArray());
        foreach ($reports as $report) {
            $groupDate[] = [
                'id' => $report->division->id,
                'date' => $report->created_date,
                'title' => $report->division->title,
            ];
        }

        return view('report.index', ['dates' => $dates, 'divisions' => $groupDate]);
    }

    public function show(Request $request): View
    {
        $data = $request->validate([
            'division_id' => 'required|integer|exists:divisions,id',
            'date' => 'date'
        ]);

        $reportsQuery = Report::query()
            ->with(['division', 'user'])
            ->where('division_id', Arr::get($data, 'division_id'))
            ->whereDate('created_at', Arr::get($data, 'date'))
            ->orderBy('entry_time')
            ->get();

        $reportsByUser = $reportsQuery->groupBy('user_id');

        return view('report.show', [
            'reportsByUser' => $reportsByUser,
            'date' => Carbon::parse($request->date)->translatedFormat('d F Y г.'),
        ]);
    }
}
