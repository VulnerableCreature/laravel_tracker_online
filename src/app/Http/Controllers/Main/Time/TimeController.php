<?php

namespace App\Http\Controllers\Main\Time;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Report\ReportContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TimeController extends Controller
{
    protected ReportContract $reportContract;

    /**
     * @param ReportContract $reportContract
     */
    public function __construct(ReportContract $reportContract)
    {
        $this->reportContract = $reportContract;
    }

    public function index(): View
    {
        return view('time.index');
    }

    public function leave(User $user): RedirectResponse
    {
        $this->reportContract->setLeaveTime($user);
        return redirect()->route('main.index');
    }
}
