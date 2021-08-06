<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div class="row">
            <div class="col-sm-12 col-md-4 col-xl-4 col-lg-8" id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav">
                    <li class="active"><a href="/">Home</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- SEARCH BAR -->
            <div class="col-sm-12 col-lg-8 col-md-8 col-xl-8">
                <div class="header-search">
                    <form class="text-end" action="{{route('search')}}" method="POST">
                        @csrf
                        <input id="search" name="search" class="input input-select" placeholder="Search here">
                        <input class="search-btn" value="Search" type="submit">
                    </form>
                </div>
            </div>
        </div>
        <!-- /SEARCH BAR -->
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
