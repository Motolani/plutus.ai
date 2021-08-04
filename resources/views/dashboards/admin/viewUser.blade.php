@extends('layouts.adminLayouts.index')

@section('center')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="admin-user">
                <div class="mt-4 mb-4 ml-4 mr-3">
                    <div class="col-md-12 col-sm-6">
                        <h1>
                            <i class="fas fa-user pr-2"></i>
                            {{$user->name . ' ' . $user->lastname}}
                        </h1>
                        <table class="table table-borderless admin-users-table pt-4 mt-4 text-center">
                            <thead>
                                <tr class="payment-history-th">
                                    <th scope="col" class="text-muted" >NAME: </th>
                                    <th scope="col" >{{$user->name . '  ' . $user->lastname}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="payment-history-td">
                                    <td class="text-muted"><strong>EMAIL ADDRESS:</strong></th>
                                    <td>{{ $user->email}}</td>
                                </tr>
                                <tr class="payment-history-td">
                                    <th scope="col" class="text-muted" >PHONE NUMBER: </th>
                                    <th scope="col" >{{$user->phone_number}}</th>
                                </tr>
                                <tr class="payment-history-td">
                                    <td class="text-muted"><strong>CITY:</strong></th>
                                    <td>{{ $user->city}}</td>
                                </tr>
                                <tr class="payment-history-td">
                                    <th scope="col" class="text-muted" >STATE/COUNTY: </th>
                                    <th scope="col" >{{$user->state_county}}</th>
                                </tr>
                                <tr class="payment-history-td">
                                    <td class="text-muted"><strong>COUNTRY:</strong></th>
                                    <td>{{ $user->country}}</td>
                                </tr>
                                <tr class="payment-history-td">
                                    <th scope="col" class="text-muted" >POSTCODE: </th>
                                    <th scope="col" >{{$user->postcode}}</th>
                                </tr>
                                <tr class="payment-history-td">
                                    <td class="text-muted"><strong>ACCOUNT CREATED:</strong></th>
                                    <td>{{ $user->created_at}}</td>
                                </tr>
                                @if ($user->role == 2)
                                    <tr class="payment-history-td">
                                        <th scope="col" class="text-muted" >ACCOUNT TYPE: </th>
                                        <th scope="col" >Enterprise User</th>
                                    </tr>
                                @endif
                                @if ($user->role == 3)
                                    <tr class="payment-history-td">
                                        <th scope="col" class="text-muted" >ACCOUNT TYPE: </th>
                                        <th scope="col" >Freelance User</th>
                                    </tr>
                                @endif
                                @if ($user->role == 4)
                                    <tr class="payment-history-td">
                                        <th scope="col" class="text-muted" >ACCOUNT TYPE: </th>
                                        <th scope="col" >Starter User</th>
                                    </tr>
                                @endif
                                @if ($user->role == 5)
                                    <tr class="payment-history-td">
                                        <th scope="col" class="text-muted" >ACCOUNT TYPE: </th>
                                        <th scope="col" >Employee User</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection