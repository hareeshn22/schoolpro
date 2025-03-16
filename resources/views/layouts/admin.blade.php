<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - SchoolPro</title>
    <meta name="description" content="School Management App ">
    <meta name="keywords" content="School, Teacher, Parent App">
    <meta name="author" content="Hareesh">
    <!-- App favicon -->
    <link rel="shortcut icon" href="backend/images/favicon.png">


    <!-- css -->
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/vendors.css') }}"> -->
    <!-- <link rel="stylesheet" href="backend/css/plugins.css"> -->
    @yield('css')
    <link rel="stylesheet" rel="preload" href="{{ asset('backend/css/app.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/color.min.css') }}"> -->
</head>

<body>

    <!-- Loader -->
    <!-- <div id="page-loader" class="show bg-gd-emerald"></div> -->
    <!-- End loader -->



    <!-- Begin page -->
    <div id="page-container" class="sidebar-o side-scroll main-content-narrow">

        <!-- ========== Left Sidebar Start ========== -->

        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center">
                    <!-- Logo -->
                    <div>
                        <span class="smini-visible fw-bold tracking-wide fs-lg">
                            c<span class="text-primary">b</span>
                        </span>
                        <a class="link-fx fw-bold tracking-wide mx-auto" href="">
                            <span class="smini-hidden">

                            </span>
                            <div>
                                <i class="fa fa-school opacity-50 me-1"></i> SchoolPro
                            </div>
                        </a>
                    </div>
                    <!-- END Logo -->

                    <!-- Options -->

                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side User -->

                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('admin.home')}}">
                                    <i class="nav-main-link-icon fa fa-house-user"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-item {{ str_contains(url()->current(), '/sliders') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/sliders') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-award"></i>
                                    <span class="nav-main-link-name">Schools</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.schools.add') }}">
                                            <span class="nav-main-link-name">Add School</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.schools') }}">
                                            <span class="nav-main-link-name">View Schools</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/principals') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu  {{ str_contains(url()->current(), '/problems') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-shield-virus"></i>
                                    <span class="nav-main-link-name">Principals</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.principals') }}">
                                            <span class="nav-main-link-name">View Principals</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.principals.add') }}">
                                            <span class="nav-main-link-name">Add Principal</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/curriculum') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/posts') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-award"></i>
                                    <span class="nav-main-link-name">Curriculum</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.syllabus') }}">
                                            <span class="nav-main-link-name">View Curriculums</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.syllabus.add') }}">
                                            <span class="nav-main-link-name">Add Curriculum</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/images') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/images') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-image"></i>
                                    <span class="nav-main-link-name">Images</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.images') }}">
                                            <span class="nav-main-link-name">View Images</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.images.add') }}">
                                            <span class="nav-main-link-name">Add Image</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/pages') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/pages') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-regular fa-file-lines"></i>
                                    <span class="nav-main-link-name">Pages</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.pages') }}">
                                            <span class="nav-main-link-name">View Pages</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.pages.add') }}">
                                            <span class="nav-main-link-name">Add Page</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/guardian') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/guardian') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-user"></i>
                                    <span class="nav-main-link-name">Parents</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.guardian') }}">
                                            <span class="nav-main-link-name">View Parents</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.guardian.add') }}">
                                            <span class="nav-main-link-name">Add Parent</span>
                                        </a>
                                    </li> -->


                                </ul>
                            </li>



                             <li class="nav-main-item {{ str_contains(url()->current(), '/teachers') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/teachers') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-chalkboard-user"></i>
                                    <span class="nav-main-link-name">Teachers</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.teachers') }}">
                                            <span class="nav-main-link-name">View Teachers</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.teachers.add') }}">
                                            <span class="nav-main-link-name">Add teachers</span>
                                        </a>
                                    </li> -->


                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/students') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/students') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid  fa-user-tie"></i>
                                    <span class="nav-main-link-name">Students</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.students') }}">
                                            <span class="nav-main-link-name">View Students</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.students.add') }}">
                                            <span class="nav-main-link-name">Add Students</span>
                                        </a>
                                    </li> -->


                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/news') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/news') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-regular fa-newspaper"></i>
                                    <span class="nav-main-link-name">News</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.news') }}">
                                            <span class="nav-main-link-name">View News</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.news.add') }}">
                                            <span class="nav-main-link-name">Add News</span>
                                        </a>
                                    </li> -->


                                </ul>
                            </li>


                            <li class="nav-main-item {{ str_contains(url()->current(), '/setting') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/setting') ? 'active' : ''}}" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-gears"></i>
                                    <span class="nav-main-link-name">Setting</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.setting') }}">
                                            <span class="nav-main-link-name">View Setting</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.setting.add') }}">
                                            <span class="nav-main-link-name">Add Setting</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>





                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- Left Sidebar End -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->


                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block fw-semibold">{{ Auth::user()->name }}</span>
                            <i class="fa fa-angle-down opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="px-2 py-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                    {{ Auth::user()->name }}
                                </h5>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                    href="#">
                                    <span>Profile</span>
                                    <i class="fa fa-fw fa-user opacity-25"></i>
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                    <span>Sign Out</span>
                                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->


                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->



            <!-- Header Loader -->
            <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->



        <main id="main-container">

            <!-- Page Content -->
            <div class="content">

                @yield('content')
            </div>
            <!-- End Page-content -->


        </main>

        <!-- end main content-->


        <!-- Footer -->
        <footer id="page-footer">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://infovict.com"
                            target="_blank">Infovict</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © SchoolPro
                    </div>
                </div>
            </div>
        </footer>

        <!-- END Footer -->

    </div>
    <!-- END layout-wrapper -->



    <!-- JavaScript -->
    <script src="{{ asset('backend/js/vendors.js') }}"></script>
    <!-- <script src="{{ asset('backend/js/plugins.js') }}"></script>-->
    @yield('scripts')

    <script src="{{ asset('backend/js/app.js') }}"></script>

</body>

</html>
