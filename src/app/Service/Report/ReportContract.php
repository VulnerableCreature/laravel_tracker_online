<?php

namespace App\Service\Report;

use App\Models\User;

interface ReportContract
{
    public function setEntryTime(User $user): bool;

    public function setLeaveTime(User $user): bool;

    public function getLeaveTime(User $user): bool;
}
