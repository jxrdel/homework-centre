<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('TTCOA.ico') }}">

    @yield('title')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body #toast-container > div {
            opacity: 1;
        }
    </style>
    @yield('styles')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('/') }}">
                <div class="sidebar-brand-icon">
                    <i style="font-size: 2rem" class="fas fa-person-breastfeeding"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VOSC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (Auth::user()->IsParent)
            <!-- Nav Item - Dashboard -->
                <li @class(['nav-item', 'active' => request()->routeIs('appointments') || request()->routeIs('bookappointment')]) id="dashboardlink">
                    <a class="nav-link" href="{{ route('appointments') }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        &nbsp;<span>Appointments</span></a>
                </li>
            @endif

            @if (Auth::user()->IsParent)
                <!-- Nav Item - Dashboard -->
                <li @class(['nav-item', 'active' => request()->routeIs('mychildren')]) id="childrenlink">
                    <a class="nav-link" href="{{ route('mychildren') }}">
                        <i class="fa-solid fa-baby"></i>
                        &nbsp;<span>My Child(ren)</span></a>
                </li>
            @endif

            @if (Auth::user()->IsParent)
                <li @class(['nav-item', 'active' => request()->routeIs('pickupcontacts') || request()->routeIs('emergencycontact') || request()->routeIs('myprofile')])>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-user"></i>&nbsp;
                        <span>My Account</span>
                    </a>
                    <div id="collapseTwo"
                    @class(['collapse', 'show' =>
                    request()->routeIs('pickupcontacts')
                    || request()->routeIs('emergencycontact')
                    || request()->routeIs('myprofile')])
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                        <div class="bg-white py-2 collapse-inner rounded">
                            <a @class(['collapse-item', 'active' => request()->routeIs('myprofile')]) href="{{ route('myprofile') }}">My Profile</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('pickupcontacts')]) href="{{ route('pickupcontacts') }}">Pickup Contacts</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('emergencycontact')]) href="{{route('emergencycontact')}}">Emergency Contact</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->IsParent)
            <!-- Nav Item - Dashboard -->
                <li @class(['nav-item', 'active' => request()->routeIs('feedback')]) id="dashboardlink">
                    <a class="nav-link" href="{{ route('feedback') }}">
                        <i class="fa-regular fa-comment"></i>
                        &nbsp;<span>Feedback</span></a>
                </li>
            @endif

            @if (Auth::user()->IsParent)
            <!-- Nav Item - Dashboard -->
                <li @class(['nav-item', 'active' => request()->routeIs('complaint')]) id="dashboardlink">
                    <a class="nav-link" href="{{ route('complaint') }}">
                        <i class="fa-solid fa-file-pen"></i>
                        &nbsp;<span>Complaint</span></a>
                </li>
            @endif

            @if (Auth::user()->IsAdmin || Auth::user()->IsSuperAdmin)
                <li @class(['nav-item', 'active' => request()->routeIs('admin.*')])>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adminCollapse"
                        aria-expanded="true" aria-controls="adminCollapse">
                        <i class="fa-solid fa-user-tie"></i>&nbsp;
                        <span>Admin</span>
                    </a>
                    <div id="adminCollapse"
                    @class(['collapse', 'show' =>
                    request()->routeIs('admin.*')])
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                        <div class="bg-white py-2 collapse-inner rounded">
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.classes')]) href="{{ route('admin.classes') }}">Classes</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.attendance') || request()->routeIs('admin.attendance.*')]) href="{{ route('admin.attendance') }}">Attendance</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.appointments') || request()->routeIs('admin.appointments.*') ]) href="{{ route('admin.appointments') }}">Appointments</a>
                            {{-- <a @class(['collapse-item', 'active' => request()->routeIs('admin.waitinglist')]) href="{{ route('admin.waitinglist') }}">Waiting List</a> --}}
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.registration')]) href="{{ route('admin.registration') }}">Registration</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.students.all')]) href="{{ route('admin.students.all') }}">Students</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.parents.all')]) href="{{ route('admin.parents.all') }}">Parents</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.feedback')]) href="{{ route('admin.feedback') }}">Feedback</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.weeklyreports')]) href="{{ route('admin.weeklyreports') }}">Weekly Reports</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.forms') || request()->routeIs('admin.forms.*')]) href="{{ route('admin.forms') }}">Forms</a>
                            <a @class(['collapse-item', 'active' => request()->routeIs('admin.stock') || request()->routeIs('admin.stock.*')]) href="{{ route('admin.stock') }}">Stock</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->IsSuperAdmin)
                <li @class(['nav-item', 'active' => request()->routeIs('superadmin.*')])>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#superAdminCollapse"
                        aria-expanded="true" aria-controls="superAdminCollapse">
                        <i class="fa-solid fa-user-tie"></i>&nbsp;
                        <span>Super Admin</span>
                    </a>
                    <div id="superAdminCollapse"
                    @class(['collapse', 'show' =>
                    request()->routeIs('superadmin.*')])
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                        <div class="bg-white py-2 collapse-inner rounded">
                            <a @class(['collapse-item', 'active' => request()->routeIs('superadmin.users')]) href="{{ route('superadmin.users') }}">Admin Users</a>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 ">
                                    {{-- Display User Name --}}
                                    @auth
                                        {{ Auth::user()->FirstName }} {{ Auth::user()->LastName }}
                                    @else
                                        Guest user
                                    @endauth
                                </span>
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('myprofile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


</body>



<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


    window.addEventListener('show-message', event => {

                toastr.options = {
                    "progressBar" : true,
                    "closeButton" : true,
                }
                toastr.success(event.detail.message,'' , {timeOut:3000});
            })
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield('scripts')


</html>
