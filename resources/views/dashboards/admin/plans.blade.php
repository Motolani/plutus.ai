@extends('layouts.adminLayouts.index')

@section('center')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="billing">
                <h3 class="fs-3 pl-5 pt-3">
                    <i class="fas fa-credit-card pb-3 pr-3"></i>
                    Plans
                </h3>
                @include('messages.flash')
                <div class="row pt-4 ml-3">
                    @foreach($plans as $plan)
                    <div class="col-sm-6 img-container">
                        <img class="img-fluid pb-4 img_plan" src="{{asset('storage/images/billing_card_img5.png')}}" alt="">
                        <div class="createplan_management pl-3">
                            <h3 class="mt-0 mb-1">${{ number_format($plan->cost, 2) }} /monthly</h3>
                            <h4>{{ $plan->name }}</h4>
                        </div>
                        <div class="edit_plan">
                            <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-dark btn-sm">Edit Plan</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-sm-6 img-container">
                        <img class="img-fluid img_plan" src="{{asset('storage/images/billing_card_img3.png')}}" alt="">
                        <div class="createplan_management pl-3">
                            <h3 class="mt-0 mb-1">$99.99<span>/ mo</span> </h3>
                            <h4>Enterprise</h4>
                        </div>
                        <div class="edit_plan">
                            <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-dark btn-sm">Edit Plan</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-6 img-container">
                        <img class="img-fluid pb-4 img_plan" src="{{asset('storage/images/billing_card_img4.png')}}" alt="">
                        <div class="createplan_management pl-3 text-white">
                            <h3 class="mt-0 mb-1">$99.99<span>/ mo</span> </h3>
                            <h4>Enterprise</h4>
                        </div>
                        <div class="edit_plan">
                            <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-dark btn-sm">Edit Plan</button>
                            </form>
                        </div>
                        
                    </div> --}}
                    <div class="col-sm-6 img-container">
                        <img class="img-fluid img_plan" src="{{asset('storage/images/billing_card_img6.png')}}" alt="">
                        <div class="create_plan">
                            <a href="{{route('create.plan')}}" class="btn btn-outline-dark btn-sm p-2">Create Plan</a>
                            {{-- <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-outline-dark btn-sm p-2">Create Plan</button>
                            </form> --}}
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-4 ml-4 mr-3">
                    <div class="col-md-12 col-sm-6">
                        <h1>Payment History</h1>

                        <table class="table table-borderless billing-payments-table pt-4 mt-4 text-center">
                            <thead>
                                <tr class="payment-history-th">
                                    <th scope="col">Discount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Interval</th>
                                    <th scope="col">Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="payment-history-td">
                                    <td scope="row">$9.99</th>
                                    <td>pending</td>
                                    <td>April 11 - April 12</td>
                                    <td>All Users</td>
                                </tr>
                                <tr class="payment-history-td">
                                    <td scope="row">$9.99</th>
                                    <td>successful</td>
                                    <td> - </td>
                                    <td>Freelancers</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection