<?php

namespace App\Http\Middleware\Report;

use App\Models\User;
use App\Service\Report\ReportContract;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReportMiddleware
{
    protected ReportContract $reportContract;

    /**
     * @param ReportContract $reportContract
     */
    public function __construct(ReportContract $reportContract)
    {
        $this->reportContract = $reportContract;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /** @var User $user */
            $user = $request->user();
            $isReported = $this->reportContract->setEntryTime($user);

            if($isReported !== false){
                return redirect()->route('time.index');
            }
        }
        return $next($request);
    }
}
