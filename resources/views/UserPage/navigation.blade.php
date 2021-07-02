<nav id="navigation">
    <!-- container -->
    <div class="container-sm">
        <!-- responsive-nav -->
        <div class="col-md-7" id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav">
                <li class="active"><a href="/">Home</a></li>
            </ul>
            <!-- /NAV -->
        </div>
         <!-- SEARCH BAR -->
         <div class="col-md-5">
            <div class="header-search">
                <form class="text-end" action="{{route('search')}}" method="POST">
                    @csrf
                    <input id="search" name="search" class="input input-select" placeholder="Search here">
                    <input class="search-btn" value="Search" type="submit">
                </form>
            </div>
        </div>
        <!-- /SEARCH BAR -->
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
