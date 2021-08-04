@extends('layouts.index')

@section('center')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <p>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
            </div>
            <div class="card">
                <form action="{{ route('subscription.create') }}" method="post" id="payment-form">
                    @csrf                    
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <!-- Stripe Elements Placeholder -->
                            <div id="card-element"></div>   
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="{{ $plan->id }}" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                        id="card-button"
                        class="btn btn-dark"
                        type="submit"
                        data-secret="{{ $intent->client_secret }}"
                        > Pay </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection