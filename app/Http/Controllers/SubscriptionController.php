<?php

namespace App\Http\Controllers;

use App\Models\Plan as ModelsPlan;
use Illuminate\Http\Request;
use App\Models\Plan;


class SubscriptionController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient("sk_test_51J0tovL3QWWj2S9pDEVLcWavz5CLRBiigkOE73g2zx6pmntOlRBYp7VSsj52Fmmj8kfR9mlDgOGCsD8hdV2IuH5I00spyTKrbh");
    }

    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('default', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        return redirect()->route('landingPage')->with('success', 'Your plan subscribed successfully, click your username to return to Dashboard');
    }


    public function createPlan()
    {
        return view('plans.create');
    }

    public function storePlan(Request $request)
    {
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] * 100;

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);

        //Stripe Plan Creation
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'month', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);

        $data['stripe_plan'] = $stripePlanCreation->id;

        Plan::create($data);

        return redirect()->route('admin.plans')->with('success', 'Your plan was created successfully');
    }
}
