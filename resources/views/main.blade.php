@extends('layouts.auth')

@section('content')

<div id="page-container" class="main-content-boxed">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="hero bg-body-dark">

            <div class="hero-inner">

                <div class="content content-full">
                    <div class="py-4 text-center">
                        <div class="display-1 fw-bold text-default">
                            <i class="fa fa-school opacity-50 me-1"></i> SchoolPro
                        </div>
                         <h1 class="fw-bold mt-5 mb-2">Welcome Admin ..</h1>
                        <h2 class="fs-4 fw-medium text-muted mb-5">The page you are looking for only admins..</h2>
                        <!-- <a class="btn btn-lg btn-alt-secondary" href="{{ route('main') }}">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Back to Home
                        </a> -->
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                    <!-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif -->
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>

@endsection
