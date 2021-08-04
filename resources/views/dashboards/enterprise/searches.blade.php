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
                            Searches
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
                                    <th scope="col" class="text-muted">No</th>
                                    <th scope="col" class="text-muted">Email</th>
                                    <th scope="col" class="text-muted">Search Name / <br> Parcel ID</th>
                                    <th scope="col" class="text-muted">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach ($titleSearches as $titleSearch)
                                    @foreach($titleSearch->users as $user)
                                        @if ($titleSearch->users['id'] = Auth::id())
                                            <tr class="payment-history-td">
                                                <td scope="row">{{ $number }}</td>
                                                <td>{{ Auth::user()->email }}</th>
                                                @if ($titleSearch->firstname)
                                                    <td>
                                                        {{$titleSearch->firstname . ' '}} {{$titleSearch->middlename . ' '}} {{$titleSearch->lastname}}
                                                    </td>
                                                @endif
                                                @if ($titleSearch->parcel_id)
                                                    <td>
                                                        {{$titleSearch->parcel_id}}
                                                    </td>
                                                @endif
                                                <td>{{$user->pivot->created_at}}</td>
                                                <?php $number++  ?>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{ $titleSearches->links() }}

                        <br>
                        <div class="employee_table pt-4 mt-4 ">
                            <h1>Employee Searches</h1>
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
                                        <td></td>
                                    </tr>
                                    <tr class="payment-history-th">
                                        <th scope="col" class="text-muted">No</th>
                                        <th scope="col" class="text-muted">Username</th>
                                        <th scope="col" class="text-muted">Email</th>
                                        <th scope="col" class="text-muted">Search Name / <br> Parcel ID</th>
                                        <th scope="col" class="text-muted">Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        @foreach($employee->titleSearches as $titleSearch)
                                            @if ($employee->enterprise_id = Auth::id())
                                                <tr class="payment-history-td">
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>{{ $employee->name . ' ' }} {{ $employee->lastname }}</th>
                                                    <td>{{ $employee->email }}</th>

                                                    @if ($titleSearch->firstname)
                                                        <td>
                                                            {{$titleSearch->firstname . ' '}} {{$titleSearch->middlename . ' '}} {{$titleSearch->lastname}}
                                                        </td>
                                                    @endif
                                                    @if ($titleSearch->parcel_id)
                                                        <td>
                                                            {{$titleSearch->parcel_id}}
                                                        </td>
                                                    @endif
                                                    <td>{{$titleSearch->pivot->created_at}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection