@php
    $menuSidebar = App\Http\Controllers\Pimpinan\PimpinanUtilites::sideBarMenu();
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a style="height:50px !important;" class="sidebar-brand d-flex align-items-center justify-content-center"
       href="#">
        <div class="sidebar-brand-icon">
            <img style="height: 37px;" src="{{asset('assets/admin/img/unud.png')}}">
        </div>
        <div style="font-size: 20px" class="sidebar-brand-text mx-3">SIM LAB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon">
            <img class="rounded-circle" style="height:50px;width:50px;"
                 src="https://bootdey.com/img/Content/avatar/avatar7.png">
        </div>
        <div style="font-size: 10px !important;margin-left:10px;"
             class="sidebar-brand-text my-3">Pimpinan <br>{{Auth::user()->name}}
        </div>
    </div>
    <!-- Divider -->
    <hr style="margin-top: 20px" class="sidebar-divider my-1">

    <!-- Nav Item - Dashboard -->
    <div class="nav-item">
        <li class="@yield('active2')">
            <a class="nav-link" href="/pimpinan">
                <i class="fa fa-fw fa-bell"></i>
                <span>Dashboard</span></a>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('active2')">
            <a class="nav-link" href="/pimpinan/calendar">
                <i class="fa fa-fw fa-calendar"></i>
                <span>Peminjaman</span></a>
        </li>
    </div>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Lain - lain
    </div>
    <div class="nav-item">
        <li class="@yield('activeBidang')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBidang"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fa fa-fw fa-book-open"></i>
                <span>Bidang</span>
            </a>
            <div id="collapseBidang" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Bidang :</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a href="/pimpinan/bidang/{{$hA->labRelation->id_laboratorium}}"
                               title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activeKetua')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKepalaLab"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Kepala Lab</span>
            </a>
            <div id="collapseKepalaLab" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kepala Lab :</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a href="/pimpinan/ketua/{{$hA->labRelation->id_laboratorium}}"
                               title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activeLog')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLog"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-list"></i>
                <span>Activity Log</span>
            </a>
            <div id="collapseLog" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Activity Log</h6>
                    <div class="collapse-item">
                        <a href="/log-berita">Log Berita</a>
                    </div>
                    <div class="collapse-item">
                        <a href="/log-laboratorium">Log Laboratorium</a>
                    </div>
                    <div class="collapse-item">
                        <a href="/log-bidang">Log Bidang</a>
                    </div>
                    <div class="collapse-item">
                        <a href="/log-layanan">Log Layanan</a>
                    </div>
                </div>
            </div>
        </li>
    </div>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <hr class="sidebar-divider d-none d-md-block">
</ul>

