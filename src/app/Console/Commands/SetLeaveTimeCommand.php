<?php

namespace App\Console\Commands;

use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SetLeaveTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:leave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Устанавливает всем пользователям время выхода в 18:00.
    Это сработает только для тех записей у которых атрибут leave_time == null за сегодняшнюю дату';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $currentDate = Carbon::now()->toDateString();

        Report::query()
            ->whereNull('leave_time')
            ->whereDate('created_at', $currentDate)
            ->update([
                'leave_time' => Carbon::now()
            ]);
    }
}
