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
                            <i class="fas fa-users pr-2"></i>
                            Employees
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
                                    <td>
                                        <a href="{{ route('enterprise.employee.create') }}" class="btn btn-outline-primary">
                                            <i class="fas fa-user pr-2"></i>
                                            Add New Employee
                                        </a>
                                    </td>
                                </tr>
                                <tr class="payment-history-th">
                                    <th scope="col" class="text-muted">
                                        No
                                    </th>
                                    <th scope="col" class="text-muted">Name</th>
                                    <th scope="col" class="text-muted">Email</th>
                                    <th scope="col" class="text-muted">Created At</th>
                                    <th scope="col" class="table-options"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach($employees as $employee)
                                    @if ($employee)
                                        <tr class="payment-history-td">
                                            <td scope="row">
                                                {{ $number }}
                                            </td>
                                            <td>{{ $employee->name . ' '}} {{ $employee->lastname}}</th>
                                            <td>{{ $employee->email}}</td>
                                            <td>{{ $employee->created_at}}</td>
                                            <td class="table-options nav-item dropup">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="#">View User</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{route('enterprise.deleteEmployee', $employee->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">Delete User</button>
                                                        </form> 
                                                    </li>
                                                </ul>    
                                            </td>
                                        </tr>
                                        <?php $number++ ?>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection