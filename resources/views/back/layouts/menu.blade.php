
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('back/')}}/index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text">StudentHW Sitesi Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Panel</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Icerik Yonetimi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link  @if(Request::segment(2)=="odevler") in @else collapsed @endif"  href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-edit"></i>
                <span>Odevler</span>
            </a>
            <div id="collapseTwo" class="collapse @if(Request::segment(2)=="odevler") show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Odev İşlemleri:</h6>
                    <a class="collapse-item @if(Request::segment(2)=="odevler" and !Request::segment(3)) active @endif " href="{{route('admin.odevler.index')}}">Tüm Odevler</a>
                    <a class="collapse-item @if(Request::segment(2)=="odevler" and Request::segment(3)=="olustur") active @endif " href="{{route('admin.odevler.create')}}">Odev Oluştur</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.message.index')}}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Mesajlar</span>
            </a>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" @if(Request::segment(2)=="kategoriler") style="color:white !important;" @endif href="{{route('admin.category.index')}}">
                <i class="fas fa-fw fa-list" @if(Request::segment(2)=="kategoriler") style="color:white !important;"@endif  ></i>
                <span>Kategoriler</span>
            </a>

        </li>




                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kadir Taban</span>

                        </a>
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
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    <a href="{{route('homepage')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-globe fa-sm text-white-50"></i> Siteyi Goruntule</a>
                </div>

