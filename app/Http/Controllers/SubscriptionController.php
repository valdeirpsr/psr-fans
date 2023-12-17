<?php

namespace App\Http\Controllers;

use App\Services\PlanService;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Request $request,
        SubscriptionService $subscriptionService,
        PlanService $planService
    ) {
        $planId = $request->session()->get('plan');

        if (! $planId) {
            return redirect()->route('home')->with('warning', __('É necessário escolher um plano para continuar'));
        }

        $plan = $planService->findById($planId);

        if (! $planId) {
            return redirect()->isNotFound();
        }

        try {
            $subscriptionService->create(
                $request->user(),
                $plan
            );
        } catch (\Exception $e) {
            report($e);

            return redirect()->isClientError();
        }

        return redirect()->intended(route('payment'));
    }
}
