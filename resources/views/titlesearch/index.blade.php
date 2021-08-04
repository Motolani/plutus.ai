@extends('layouts.index')

@section('center')
<div class="title-search-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6  mt-3">
                <div class="titlesearch-nav mt-5">
                    {{-- user nav links --}}
                    <div class="profile-nav">
                        <ul class="title_search_nav ml-auto mb-2 mb-lg-0" id="profileTab" >
                            <li class="nav-item">
                                <span class="nav-link tab active"  data-tab-target="#user_info">
                                    <i class="fas fa-search"> </i>
                                    Search by Name
                                </span>
                            </li>
                            <li class="nav-item" >
                                <span class="nav-link tab" data-tab-target="#billing">
                                    <i class="fas fa-search"> </i> 
                                    Search by Parcel ID
                                </span>
                            </li>
                        </ul>

                        {{-- NavTab Content --}}
                        <div class="container user-nav-content">
                            {{-- User Details --}}
                            <div id="user_info" data-tab-content class="active mt-3">
                                <form action="{{ route('title.searching') }}" method="POST" class="g-3 mb-3 ">
                                    @csrf 

                                    @if(session('success'))
                                        <div class="alert alert-success mt-4" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger mt-4" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    <div class="search_name mb-3">
                                        <label for="lastname" class="form-label">Lastname</label>
                                        <input type="text" class="form-control" placeholder="Enter the Holder's Lastname" aria-label="lastname" name="lastname" aria-describedby="button-addon2">
                                    </div>
                                    <div class="search_name mb-3">
                                        <label for="firstname" class="form-label">Firstname</label>
                                        <input type="text" class="form-control" placeholder="Enter the Holder's Firstname" aria-label="firstname" name="firstname" aria-describedby="button-addon2">
                                    </div>
                                    <div class="search_name mb-3">
                                        <label for="middlename" class="form-label">Middlename</label>
                                        <input type="text" class="form-control" placeholder="Enter the Holder's Middlename" aria-label="middlename" name="middlename" aria-describedby="button-addon2">
                                    </div>
                                    <div class="d-md-flex justify-content-md-end mt-3">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div id="billing" data-tab-content class="mt-5 pb-4">
                                <form action="{{ route('title.searching') }}" method="POST" class="g-3 mb-3 ">
                                    @csrf 
                                    
                                    @if(session('success'))
                                        <div class="alert alert-success mt-4" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger mt-4" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    
                                    <div class="search_name mb-3">
                                        <label for="parcel_id" class="form-label">Parcel ID</label>
                                        <input type="text" class="form-control" placeholder="Enter the Parcel ID" aria-label="parcel_id" name="parcel_id" aria-describedby="button-addon2">
                                    </div>
                                    <div class="d-md-flex justify-content-md-end mt-3">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection