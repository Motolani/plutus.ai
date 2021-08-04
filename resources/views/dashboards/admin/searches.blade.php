@extends('layouts.adminLayouts.index')

@section('center')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="admin-starter-users">
                <div class="mt-4 mb-4 ml-4 mr-3">
                    <div class="col-md-12 col-sm-6">
                        <h1>
                            <i class="fas fa-search pr-2"></i>
                            Search
                        </h1>
                        @include('messages.flash')
                        <table class="table table-borderless admin-users-table pt-4 mt-4 text-center">
                            <thead>
                                <tr class="payment-history-td">
                                    <td scope="row" colspan="4" class="pl-5">
                                    <form class="form-inline" action="{{ route('admin.userQueries') }}" method ="GET">
                                        @csrf
                                        <input type="text" class="form-control" name="query" placeholder="Search here....">
                                        <button type="submit" class="btn btn-outline-info  ml-3">
                                            <i class="fas fa-search"></i>
                                            Search
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                                <tr class="payment-history-th">
                                    <th scope="col" class="text-muted">
                                        No
                                    </th>
                                    <th scope="col" class="text-muted">Search Name/ <br>Parcel ID</th>                    
                                    <th scope="col" class="text-muted">Users</th>
                                    <th scope="col" class="text-muted">Search Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach ($searches as $search)
                                    @foreach ($search->users as $user)
                                        <tr class="payment-history-td">
                                            <td scope="row" class="form-check">
                                                {{ $number }}
                                            </td>
                                            @if ($search->firstname)
                                                <td>
                                                    {{$search->firstname . ' '}} {{$search->middlename . ' '}} {{$search->lastname}}
                                                </td>
                                            @endif
                                            @if ($search->parcel_id)
                                                <td>
                                                    {{$search->parcel_id}}
                                                </td>
                                            @endif
                                            <td>{{$user->name . ' '}} {{$user->lastname}}</td>
                                            <td>{{$user->pivot->created_at}}</td>
                                            <?php $number++ ?> 
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{ $searches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection