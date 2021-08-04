@extends('layouts.adminLayouts.index')

@section('center')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="billing">
                <h3 class="fs-3 pl-4 pt-3">
                    <i class="fas fa-credit-card pb-3 pr-3"></i>
                    Billing
                </h3>
                <div class="row pt-4 ml-3">
                    <div class="col-sm-6 img-container">
                        <img class="img-fluid pb-4 img_plan" src="{{asset('storage/images/billing_card_img5.png')}}" alt="">
                        <div class="plan_management pl-3 text-white">
                            <p class="mb-1">Current Subscription Plan</p>
                            <h3 class="mt-0 mb-1">$99.99<span>/ mo</span> </h3>
                            <h4>Enterprise</h4>
                        </div>
                        <div class="edit_plan">
                            <a href="{{ route('plans.index') }}" class="btn btn-light btn-sm text-info">Subscribe</a>
                        </div>
                        
                    </div>
                    <div class="col-sm-6 img-container">
                        <img class="img-fluid img_plan" src="{{asset('storage/images/billing_card_img6.png')}}" alt="">
                        <div class="plan_management pl-3">
                            <p class="mb-1">Next payment</p>
                            <h3 class="mt-0 mb-1">$99.99<span>/ mo</span> </h3>
                            <h4>Enterprise</h4>
                        </div>
                        <div class="edit_plan">
                            <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-dark btn-sm">Manage</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-4 ml-4 mr-3">
                    <div class="col-md-12 col-sm-6">
                        <h1>Payment History</h1>

                        <table class="table table-borderless billing-payments-table pt-4 mt-4 text-center">
                            <thead>
                                <tr class="payment-history-th">
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment method</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subscriptions as $subscription)
                                <tr class="payment-history-td">
                                    <td scope="row">$ {{
                                        $plans->retrieve(
                                            $subscription->stripe_price,
                                        []
                                        )->amount
                                        }}</th>
                                    <td>{{$subscription->stripe_status}}</td>
                                    <td>{{$subscription->created_at}}</td>
                                    <td>Mastercard**9921</td>
                                </tr>
                                @empty
                                <tr class="payment-history-td">
                                    <td scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection