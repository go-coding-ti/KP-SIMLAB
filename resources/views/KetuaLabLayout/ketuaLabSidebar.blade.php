<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a style="height:50px !important;" class="sidebar-brand d-flex align-items-center justify-content-center"
       href="/admin">
        <div class="sidebar-brand-icon">
            <img style="height: 37px;" src="{{asset('assets/admin/img/unud.png')}}">
        </div>
        <div style="font-size: 20px" class="sidebar-brand-text mx-3">SIM LAB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon">
            <img class="border rounded-circle" style="height:50px;width:50px;"
                 src="{{asset('assets/admin/img/guest.png')}}">
        </div>
        <div style="font-size: 10px !important;margin-left:10px;"
             class="sidebar-brand-text my-3">Kepala Lab <br>{{\Illuminate\Support\Facades\Auth::user()->name}}
        </div>
    </div>
    <!-- Divider -->
    <hr style="margin-top: 20px" class="sidebar-divider my-1">

    <!-- Nav Item - Dashboard -->
    <div class="nav-item">
        <li class="@yield('active2')">
            <a class="nav-link" href="/kepala">
                <i class="fa fa-fw fa-bell"></i>
                <span>Dashboard</span></a>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('calendar')">
            <a class="nav-link" href="/kepala/calendar">
                <i class="fa fa-fw fa-calendar"></i>
                <span>Calendar</span></a>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activeReport')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRemu"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Report</span>
            </a>
            <div id="collapseRemu" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Report Labs:</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a class="@yield('collapse1')" href="/kepala/report/{{$hA->labRelation->id_laboratorium}}" title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activePeminjaman')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeminjaman"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-fw fa-money-check"></i>
                <span>Peminjaman</span>
            </a>
            <div id="collapsePeminjaman" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">List Peminjaman :</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a href="/kepala/peminjaman/{{$hA->labRelation->id_laboratorium}}" title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
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
                            <a href="/kepala/bidang/{{$hA->labRelation->id_laboratorium}}" title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activeTeknisi')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeknisi"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Teknisi</span>
            </a>
            <div id="collapseTeknisi" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Teknisi Saya :</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a href="/kepala/teknisi/{{$hA->labRelation->id_laboratorium}}" title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>

    <div class="nav-item">
        <li class="@yield('activeBerita')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita"
               aria-expanded="true" aria-controls="collapseRemu">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Berita Lab</span>
            </a>
            <div id="collapseBerita" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Berita Labs:</h6>
                    @foreach($menuSidebar as $hA)
                        <div class="collapse-item">
                            <a href="/kepala/berita/{{$hA->labRelation->id_laboratorium}}" title="{{$hA->labRelation->nama_lab}}">{{\Illuminate\Support\Str::limit($hA->labRelation->nama_lab, 20) }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    </div>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



    <!-- Nav Item - Charts -->
    <!--<li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>-->

    <!-- Nav Item - Tables -->
    <!--<li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>-->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkp" aria-expanded="true" aria-controls="collapseSkp">
        <i class="fas fa-fw fa-folder"></i>
        <span>SKP</span>
      </a>
      <div id="collapseSkp" class="collapse" aria-labelledby="headingSkp" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKI" aria-expanded="true" aria-controls="collapseKI">
        <i class="fas fa-fw fa-list"></i>
        <span>Karya Ilmiah</span>
      </a>
      <div id="collapseKI" class="collapse" aria-labelledby="headingKI" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li> -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!--<div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>-->

</ul>
<!-- End of Sidebar -->
