@extends('layouts.adminLayouts.index')

@section('center')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="settings">
                <h3 class="fs-3 pl-2 pt-3">
                    <i class="fas fa-cogs pb-3 pr-3"></i>
                    Settings
                </h3>
                @if(session('success'))
                        <div class="alert alert-success mt-4" role="alert">
                            {{session('success')}}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger mt-4" role="alert">
                            {{session('error')}}
                        </div>
                @endif
                {{-- Update User Details --}}
                <form action="{{ route('update.enterpriseprofile') }}" method="POST" class="g-3">
                    @csrf 
                    <h1 class="pt-3 ml-3 ">Update User</h1>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="name" class="form-label">{{ __('Firstname') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{ Auth::user()->lastname }}" required autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="email" class="form-label">{{ __('User Email') }}</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->phone_number }}" required autofocus>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="city" class="form-label">{{ __('City') }}</label>
                                <input id="city" type="tel" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->city }}" required autocomplete="city" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="state_county" class="form-label">{{ __('State/County') }}</label>
                                <input id="state_county" type="text" class="form-control @error('state_county') is-invalid @enderror" name="state_county" value="{{ Auth::user()->state_county}}" required autocomplete="state_county" autofocus>
                                @error('state_county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="postcode" class="form-label">{{ __('Postcode') }}</label>
                                <input id="postcode" type="tel" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ Auth::user()->postcode }}" required autocomplete="postcode" autofocus>
                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-outline mr-3 ml-3">
                                <label for="country" class="form-label">{{ __('Country') }}</label>
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ Auth::user()->county}}" required autocomplete="country" autofocus>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pt-4 pb-3">
                        <button type="submit" class="btn btn-primary">    Update User    </button>
                    </div>
                </form><hr>

                <form action="{{ route('upload.employeeavatar') }}" method="POST" class="g-3" enctype="multipart/form-data">
                    @csrf
                    <h1 class="pt-3 ml-3 ">Change Profile Picture</h1>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <div class="form-outline mr-3 ml-3">
                                <label for="avatar" class="form-label"></label>
                                <input class="form-control avatar-upload @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" autofocus>
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        <div class="col-sm-4 pt-4 pb-3">
                            <button type="submit" value="upload" class="btn btn-primary">    Upload Picture    </button>
                        </div>   
                    </div>
                </form> <hr>

                <form action="{{ route('update.enterprisepassword') }}" method="POST" class="g-3">
                    @csrf

                    <h1 class="pt-3 ml-3 ">Change Password</h1>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <div class="form-outline mr-3 ml-3">
                                <label for="old-password" class="form-label">{{ __('Current Password') }}</label>
                                <input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" placeholder="Enter old password" required autofocus>
                                @error('old-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                        <div class="col-sm-4">
                            <div class="form-outline mr-3 ml-3">
                                <label for="password" class="form-label">{{ __('New Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password" required autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-outline mr-3 ml-3">
                                <label for="confirm-password" class="form-label">{{ __('Confirm New Password') }}</label>
                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="password_confirmation" placeholder="Enter new password again" required autofocus>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-4 pt-4 pb-3">
                        <button type="submit" class="btn btn-primary">    Update Password    </button>
                    </div>
                </form> <hr>
                {{-- Notification settings --}}
                <div class="notification_preferrences pt-3 ml-4 mb-5">
                    
                    <h1>Notification Preferrences</h1>
                    <p>Viverra nulla interdum ac aliquam enim amet non, nunc. Eget dignissim suspendisse eget dictum id neque.</p>
                    <form action="#" method="POST" class="g-3">
                        @csrf
                        <div class="row">  
                            <div class="col-sm-2"> 
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-sm-10 mt-1">
                                <p>Monthly Statement</p>
                            </div>
                            <div class="col-2">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-sm-10 mt-1">
                                <p>Feedback notification</p>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Delete Account --}}
                {{-- <div class="delete_account pt-2 ml-4">
                    <h1>Delete account</h1>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row pt-1">
                            <div class="col-sm-8">
                                <p>Viverra nulla interdum ac aliquam enim amet non, nunc. Eget dignissim.</p>
                            </div>
                            <div class="col-sm-4 pb-4">
                                <button type="submit"  class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete Account</button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            You about to delete your account, are you sure
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Delete Account</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>  
        </div>
    </div>
</div>
@endsection