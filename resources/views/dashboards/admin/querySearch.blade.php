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
                            User Search
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
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="payment-history-th">
                                    <th scope="col" class="text-muted">Name</th>
                                    <th scope="col" class="text-muted">Email</th>
                                    <th scope="col" class="text-muted">User Type</th>
                                    <th scope="col" class="text-muted">Subscription Status</th>
                                    <th scope="col" class="text-muted">created at</th>
                                    <th scope="col" class="table-options"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($users as $user)
                                    <tr class="payment-history-td">
                                        <td>{{ $user->name . ' '}} {{ $user->lastname}}</th>
                                        <td>{{ $user->email}}</td>
                                        <td>
                                            @if($user->role == 1)
                                                ADMIN
                                            @endif
                                            @if($user->role == 2)
                                                ENTERPRISE
                                            @endif
                                            @if($user->role == 3)
                                                FREELANCE
                                            @endif
                                            @if($user->role == 4)
                                                STARTER
                                            @endif
                                            @if($user->role == 5)
                                                EMPLOYEE
                                            @endif
                                        </td>
                                        <td> - </td>
                                        <td>{{ $user->created_at}}</td>
                                        <td class="table-options nav-item dropup">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="{{ route('admin.show.users', $user->id) }}">View User</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                            </ul>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection