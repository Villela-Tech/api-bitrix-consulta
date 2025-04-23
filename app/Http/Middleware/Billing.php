<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\BillingService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class Billing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app('auth')->user()) {

            $billing = (new BillingService)->info();

            app('view')->share('billing', $billing);

            // dd($billing);

            // $currentRoute = $request->route()->getName();
            $currentRoute = $request->getPathInfo();

            if ($currentRoute == '/dashboard') {
                return $next($request);
            }

            if ($billing->trial) {
                return $next($request);
            }

            if (!$billing->active) {
                // $message = 'Permission denied. Subscription is not active.';
                // Log::info($message);
                return response()->json(trans('messages.billing.permission_denied'), 403);
                // abort(403, $message);
            }
        }

        return $next($request);
    }
}
