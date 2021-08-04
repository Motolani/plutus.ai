@extends('layouts.index')

@section('center')
@include('messages.flash')
<div class="landing-page">
    <div class="landing-search">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row about-section pt-5 mt-5 ml-1">
                    <div class="col-md-5 col-lg-5 col-8">
                        <h3>Amet minim mollit non deserunt ullamco est sit aliqua dolor</h3>
                    </div>
                    <div class="col-md-6 col-lg-6 col-1"></div>
                    <div class="col-md-1 col-lg-1 col-1"></div>
                    
                    <div class="col-md-5 col-7">
                        <p>
                            Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                    </div>
                    <div class="col-md-1 col-1"></div>
                    <div class="col-md-6 col-2"></div>
                </div>
            </div>
        </div>
        <div class="ad-box-section">
            <div class="container">
                <div class="row ad-box">
                    <div class="col-md-3 ad">
                        <img src="{{ asset('storage/images/forbes.png') }}" class="d-block m-auto" alt="Forbes">
                    </div>
                    <div class="col-md-3 ad">
                        <img src="{{ asset('storage/images/Bloomberg.png') }}" class="d-block m-auto" alt="Bloomberg">
                    </div>
                    <div class="col-md-3 ad">
                        <img src="{{ asset('storage/images/bbc.png') }}" class="d-block m-auto" alt="BBC">
                    </div>
                    <div class="col-md-3 ad">
                        <img src="{{ asset('storage/images/allianz.png') }}" class="d-block m-auto" alt="Allianz">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-us-section jumbotron-fluid">
        <div class="container">
            <div class="row why-us-content">
                <div class="col-md-5col-lg-7 img-fluid why-us">
                    <img src="{{ asset('storage/images/building.png') }}" class="img-fluid" alt="building">
                </div>
                <div class="col-md-7 col-lg-5 why-us">
                    <div class="text">
                        <h3 class="why-us-h3">Why Choose Us</h3>
                        <br>
                        <h4>1. Quickly Search Property from Your Desk </h4>
                        <p>
                            Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                        </p>
                        <br>
                        <h4>2. Convenient Search Options are Available</h4>
                        <p>
                            Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                        </p>
                        <br>
                        <h4>3. Easy Payment</h4>
                        <p>
                            Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="pricing-section"><br><br>
        <div class="container">
            <div class="row pricing">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h3 class="text-center pricing-h3">Our Pricing</h3>
                    <p>
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                    </p>
                </div>
                <div class="col-sm-3"></div>
                <br>
            </div> 
            <div class="row mt-5">
                <div class="col-md-4 col-sm-6 packages">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/images/startericon.png')}}" class="card-img-top" alt="icon">
                        <div class="card-body card-body-pricing">
                            <h3 class="card-text">Starter</h3>
                            <h4 class="card-text">$9.99 / mo</h4><br>
                            <div class="listed-packages">
                                <ul>
                                    <li>2 searches per day</li>
                                    <li>Amet minim mollit</li>   
                                    <li>Exercitation veniam consequat</li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 packages"><br>
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/images/freelancericon.png')}}" class="card-img-top" alt="icon">
                        <div class="card-body card-body-pricing">
                            <h3 class="card-text">Freelancer</h3>
                            <h4 class="card-text">$19.99 / mo</h4><br>
                            <div class="listed-packages">
                                <ul>
                                    <li>2 searches per day</li>
                                    <li>Amet minim mollit</li>   
                                    <li>Exercitation veniam consequat</li> 
                                    <li>Exerciton veniam consequa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 packages"><br>
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/images/enterpriseicon.png')}}" class="card-img-top" alt="icon">
                        <div class="card-body card-body-pricing">
                            <h3 class="card-text">Enterprise</h3>
                            <h4 class="card-text">$99.99 / mo</h4><br>
                            <div class="listed-packages">
                                <ul>
                                    <li>2 searches per day</li>
                                    <li>50 sub-accounts</li>   
                                    <li>Exercitation veniam consequat</li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-register-section jumbotron-fluid">
        <div class="container">
            <div class="row register-section">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 register-content">
                    <p class="register-text">Amet minim non deserunt ullamco est sit</p>
                    <h3>NEIGHBORHOOD INFORMATION</h3>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam..</p><br>
                    @guest
                        <div class="text-center">
                            <a href="{{route('new.register')}}" class="btn btn-primary landing-register-btn">Register</a>
                        </div>
                    @endguest
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <div class="questions"><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="questions-h3">Got questions?</h3>
                    <p class="questions-p">Get in touch with us</p>
                    @if(Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message_sent')}}
                        </div>
                    @endif
                    <form action="{{route('enquiry.send')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row message">
                            <div class="col-12">
                                <textarea class="form-control" name="msg" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="row submit-btn">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 mail_icon">
                    <img src="{{asset('storage/images/mail_icon.png')}}" alt="Mail Logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection