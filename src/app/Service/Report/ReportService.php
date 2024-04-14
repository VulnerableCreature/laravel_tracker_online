<?php

namespace App\Service\Report;

use App\Models\User;
use Carbon\Carbon;

class ReportService implements ReportContract
{
    public function setEntryTime(User $user): bool
    {
        /** @var User $user */
        $user = auth()->user();
        $division = $user->division->division_id;
        $currentDate = Carbon::now()->toDateString();

        $report = $user->reports()->whereDate('created_at', $currentDate)->latest()->first();

        if (!$report) {
            $user->reports()->create([
                'user_id' => $user->id,
                'division_id' => $division,
                'entry_time' => Carbon::now(),
            ]);

            return true;
        }

        return false;
    }

    public function setLeaveTime(User $user): bool
    {
        /** @var User $user */
        $user = auth()->user();
        $currentDate = Carbon::now()->toDateString();

        $report = $user->reports()->whereDate('created_at', $currentDate)->latest();
        if ($report) {
            $user->reports()->update([
                'leave_time' => Carbon::now(),
            ]);

            return true;
        }

        return false;
    }

    public function getLeaveTime(User $user): bool
    {
        $currentDate = Carbon::now()->toDateString();
        $report = $user->reports()->whereNull('leave_time')->whereDate('created_at', $currentDate)?->latest()?->first()?->exists();

        if ($report) {
            return true;
        } else {
            return false;
        }
    }
}
