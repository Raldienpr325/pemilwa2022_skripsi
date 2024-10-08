<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pemilwa FK & FIKES 2022</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body id="page-top">

    @include('sweetalert::alert')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon5">
                    <img src="{{ asset('img/logoub.png') }}" class="img-circle elevation-2" alt="User Image" style="width: 32px; margin-right: 5px">
                </div>
                <div class="sidebar-brand-text">
                    @php
                        $admin = auth('admin')->user();
                        $user = auth('user')->user();
                        @$userPRODI = auth('user')->user()->prodi;
                    @endphp
                    {{ $user ? auth('user')->user()->name : auth('admin')->user()->nama }}
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if ($admin)
                {{-- <li class="nav-item {{ Request::is('dashboard-admin') ? 'active' : '' }}">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li> --}}
                <!-- Nav Item - Dashboard -->


                <!-- Divider -->
                <hr class="sidebar-divider">
                @if (auth('admin')->user()->nama == 'Super Admin')
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Fakultas Kedokteran
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li
                        class="nav-item {{ Request()->routeIs('presma-fk.*') || Request()->routeIs('presma-fk.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed " href="{{ route('presma-fk.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>Presma FK</span>
                        </a>
                    </li>

                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item {{ Request()->routeIs('dpm-fk.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('dpm-fk.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>DPM FK</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request()->routeIs('record-fk') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('record-fk') }}">
                            <i class="fas fa-user"></i>
                            <span>Record Voting Mahasiswa</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('chartPresmaFK') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting Presma</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('chartDpmFK') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting DPM</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('recordpsked') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSKED</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('recordpskb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSKB</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('recordpssf') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSSF</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('allmahasiswa') }}">
                            <i class="fas fa-address-book"></i>
                            <span>All Mahasiswa</span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Fakultas Ilmu Kesehatan
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item {{ Request()->routeIs('presma-fikes.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('presma-fikes.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>Presma FIKES</span>
                        </a>
                    </li>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item {{ Request()->routeIs('dpm-fikes.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('dpm-fikes.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>DPM FIKES</span></a>
                    </li>
                    <li class="nav-item {{ Request()->routeIs('record-fikes') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('record-fikes') }}">
                            <i class="fas fa-user"></i>
                            <span>Record Voting Mahasiswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('chartPresmaFikes') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting Presma</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('chartDpmFikes') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting DPM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsigl') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIG</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsikl') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIK</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsigb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIG 2022</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsikb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIK 2022</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('allmahasiswafikes') }}">
                            <i class="fas fa-address-book"></i>
                            <span>All Mahasiswa</span>
                        </a>
                    </li>
                @elseif (auth('admin')->user()->nama == 'Admin FK')
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Fakultas Kedokteran
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li
                        class="nav-item {{ Request()->routeIs('presma-fk.*') || Request()->routeIs('presma-fk.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed " href="{{ route('presma-fk.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>Presma FK</span>
                        </a>
                    </li>

                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item {{ Request()->routeIs('dpm-fk.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('dpm-fk.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>DPM FK</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request()->routeIs('record-fk') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('record-fk') }}">
                            <i class="fas fa-user"></i>
                            <span>Record Voting Mahasiswa</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('chartPresmaFK') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting Presma</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('chartDpmFK') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting DPM</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('recordpsked') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSKED</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('recordpskb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSKB</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('recordpssf') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSSF</span>
                        </a>
                    </li>
                @elseif(auth('admin')->user()->nama == 'Admin FIKES')
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Fakultas Ilmu Kesehatan
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item {{ Request()->routeIs('presma-fikes.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('presma-fikes.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>Presma FIKES</span>
                        </a>
                    </li>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item {{ Request()->routeIs('dpm-fikes.*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('dpm-fikes.index') }}">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>DPM FIKES</span></a>
                    </li>
                    <li class="nav-item {{ Request()->routeIs('record-fikes') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{ route('record-fikes') }}">
                            <i class="fas fa-user"></i>
                            <span>Record Voting Mahasiswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('chartPresmaFikes') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting Presma</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('chartDpmFikes') }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Hasil Voting DPM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsigl') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIG</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsikl') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIK</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsigb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIG 2022</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('recordpsikb') }}">
                            <i class="fas fa-address-book"></i>
                            <span>PSIK 2022</span>
                        </a>
                    </li>
                @endif
            @endif

            @if ($userPRODI == 'Profesi Dokter' ||
                $userPRODI == 'S1 Profesi Bidan' ||
                $userPRODI == 'Profesi Apoteker' ||
                $userPRODI == 'Kedokteran' ||
                $userPRODI == 'Kebidanan' ||
                $userPRODI == 'Farmasi' ||
                $userPRODI == 'Dekan FK')
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Fakultas Kedokteran
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('votingPresmaFk') }}">
                        <i class="fas fa-user"></i>
                        <span>Presma FK</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('votingDpmFk') }}">
                        <i class="fas fa-user"></i>
                        <span>DPM FK</span>
                    </a>
                </li>
            @elseif($userPRODI == 'Kajur Farmasi' || $userPRODI == 'PSIGB' || $userPRODI == 'PSIKL' || $userPRODI == 'PSIKB')
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Fakultas Ilmu Kesehatan
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('votingPresmaFikes') }}">
                        <i class="fas fa-user"></i>
                        <span>Presma FIKES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('votingDpmFikes') }}">
                        <i class="fas fa-user"></i>
                        <span>DPM FIKES</span>
                    </a>
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

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> --}}

                        <!-- Nav Item - Alerts -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Alerts</a>
                            </div>
                        </li> --}}

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy
                                            with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                    Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <form id="logout-form " action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger mr-2"
                                    style="font-size:13px">Logout</button>
                            </form>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
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
                    <div class="content-wrapper">
                        <section class="content">
                            @yield('content')
                        </section>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pemilwa FK UB 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    @yield('chart')

</body>

</html>
