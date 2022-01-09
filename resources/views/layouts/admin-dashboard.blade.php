<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('adminmart assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminmart assets/libs/chartist/dist/chartist.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('adminmart assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}"
        rel="stylesheet" />

    <link href="{{ asset('adminmart assets/css/style.min.css') }}" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>


    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">



        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a>
                            <span class="logo-text" style="margin-left:10px;">
                                {{ config('app.name', 'TCMS') }}
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: white;">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    </ul>


                    <ul class="navbar-nav float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('adminmart assets/images/users/default-avatar.png') }}"
                                    alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i
                                        data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">

                                    <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    {{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{url('/admin.admin-dashboard')}}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span></a></li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Manage Timetable</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{url('admin.admin-create-user-timetable')}}" aria-expanded="false"><i data-feather="list"
                                    class="feather-icon"></i><span class="hide-menu">Create</span></a></li>
                        <br>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-manage-user-timetable')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Manage</span></a></li>

                        <li class="list-divider"></li>



                        <li class="nav-small-cap"><span class="hide-menu">Manage Attendance</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-view-attendance')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">View</span></a></li>


                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Manage Users</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-create-user')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Create</span></a></li>
                        <br>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-user-list')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Manage</span></a></li>


                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">View Users</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-manage-teacher')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Teachers</span></a></li>
                        <br>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-manage-student')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Student</span></a></li>


                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">View Subject Enrol</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('admin.admin-view-subject-enrol-list')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">View</span></a></li>

                    </ul>
                </nav>
            </div>
        </aside>



        @yield('content')

        <footer class="footer text-center text-muted">
            &copy;Copyright © 2021 NG WENG KANG</a>.
        </footer>

    </div>







</body>

</html>

<script src="{{ asset('adminmart assets/extra-libs/sparkline/sparkline.js') }}"></script>
<script src="{{ asset('adminmart assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminmart assets/libs/popper.js/dist/umd/popper.min.js') }}">
</script>
<script src="{{ asset('adminmart assets/libs/bootstrap/dist/js/bootstrap.min.js') }}">
</script>
<script src="{{ asset('adminmart assets/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('adminmart assets/js/feather.min.js') }}"></script>
<script
    src="{{ asset('adminmart assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}">
</script>
<script src="{{ asset('adminmart assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('adminmart assets/js/custom.min.js') }}"></script>
<script src="{{ asset('adminmart assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('adminmart assets/extra-libs/c3/c3.min.js') }}"></script>
<script src="{{ asset('adminmart assets/libs/chartist/dist/chartist.min.js') }}">
</script>
<script
    src="{{ asset('adminmart assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
</script>
<script
    src="{{ asset('adminmart assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}">
</script>
<script
    src="{{ asset('adminmart assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}">
</script>
<script src="{{ asset('adminmart assets/js/pages/dashboards/dashboard1.min.js') }}">
</script>
<script
    src="{{ asset('adminmart assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('adminmart assets/js/pages/datatable/datatable-basic.init.js') }}">
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAphLmTkJdgAd_CuSE18mJFDTMNuFLs9jU&libraries=places&callback=initialize"
    async defer></script>

<script src="{{ asset('adminmart assets/js/widget.js') }}"></script>

