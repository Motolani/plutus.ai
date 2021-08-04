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
                            <i class="fas fa-comments pr-2"></i>
                            Feedbacks
                        </h1>
                        <table class="table table-borderless admin-users-table pt-4 mt-4 text-center">
                            <thead>
                                <tr class="payment-history-td">
                                    <td scope="row" class="nav-item dropdown" height="60">
                                        <button type="button" class="btn btn-outline-info nav-link dropdown-toggle ml-3" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter"></i>
                                            Filter
                                        </button>
                                        <ul class="dropdown-menu filter-options" aria-labelledby="navbarDropdown">
                                            <li class="fs-6 text-muted pl-2">
                                                SORT BY:
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">Default</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">Name</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">User status</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="dmb-1 text-dark filter-anchor" href="#">Subscription</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchorm" href="#">Amount</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li class="fs-6 text-muted pl-2">
                                                USER:
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">All</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">Active</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                            <li class="dropdown-item d-flex pl-5">
                                                <a class="mb-1 text-dark filter-anchor" href="#">Inactive</a>
                                                <input class="pl-5 form-check-input mr-auto" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </li>
                                        </ul> 
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="payment-history-th">
                                    <th scope="col" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                    <th scope="col" class="text-muted">User</th>
                                    <th scope="col" class="text-muted">Subject</th>
                                    <th scope="col" class="text-muted">Content</th>
                                    <th scope="col" class="table-options"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="payment-history-td">
                                    <td scope="row" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>$9.99</th>
                                    <td>pending</td>
                                    <td>April 11 - April 12</td>
                                    <td class="table-options nav-item dropup">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        </ul>    
                                    </td>
                                </tr>
                                <tr class="payment-history-td">
                                    <td scope="row" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" >
                                    </td>
                                    <td>$9.99</th>
                                    <td>successful</td>
                                    <td> - </td>
                                    <td class="table-options nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                                            <li><a class="dropdown-item text-success" href="#">Active Users</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        </ul>    
                                    </td>
                                </tr>
                                <tr class="payment-history-td">
                                    <td scope="row" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" >
                                    </td>
                                    <td>$9.99</th>
                                    <td>successful</td>
                                    <td> - </td>
                                    <td class="table-options nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                                            <li><a class="dropdown-item text-success" href="#">Active Users</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        </ul>    
                                    </td>
                                </tr>
                                <tr class="payment-history-td">
                                    <td scope="row" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" >
                                    </td>
                                    <td>$9.99</th>
                                    <td>successful</td>
                                    <td> - </td>
                                    <td class="table-options nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                                            <li><a class="dropdown-item text-success" href="#">Active Users</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        </ul>    
                                    </td>
                                </tr>
                                <tr class="payment-history-td">
                                    <td scope="row" class="form-check">
                                        <input class="form-check-input admin-table-check" type="checkbox" value="" >
                                    </td>
                                    <td>$9.99</th>
                                    <td>successful</td>
                                    <td> - </td>
                                    <td class="table-options nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                                            <li><a class="dropdown-item text-success" href="#">Active Users</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        </ul>    
                                    </td>
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