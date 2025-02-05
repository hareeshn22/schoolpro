@extends('layouts.auth')

@section('content')

<div id="page-container" class="main-content-boxed">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-dark">
            <div class="row mx-0 justify-content-center">
                <div class="hero-static col-lg-6 col-xl-4">
                    <div class="content content-full overflow-hidden">
                        <!-- Header -->
                        <div class="py-4 text-center">
                            <!-- <a class="link-fx fw-bold" href="#"> -->
                                
                                <h4 class="fs-4 text-body-color text-default"> <i class="fa-solid fa-school-flag"></i> DigitalSchool</h4>
                            <!-- </a> -->
                            <h5 class="h5 fw-bold mt-4 mb-2">Welcome to Your Dashboard</h5>
                            <h6 class="h6 fw-medium text-muted mb-0">It’s a great day today!</h6>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">

                            @csrf
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-default">
                                    <h3 class="block-title">Please Sign In</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Enter your email" required value="{{ old('email') }}">
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password"
                                            name="password" placeholder="Enter your password">
                                        <label class="form-label" for="login-password">Password</label>
                                    </div>
                   
                                    <div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 d-sm-flex align-items-center push">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="login-remember-me" name="login-remember-me">
                                                <label class="form-check-label" for="login-remember-me">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-end push">
                                            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
                                    <!-- <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#">
                                        <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                                    </a>-->
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#">
                                        Forgot Password
                                    </a>

                                    <div>

                                        <p>© 2025 DigitalSchool.
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>



@endsection