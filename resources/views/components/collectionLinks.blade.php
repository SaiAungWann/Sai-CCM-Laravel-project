@php
$categories = \App\Models\Category::all();
@endphp

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="#">Hot Deals</a></li>
                <li><a href="/categoryCollections">Categories</a></li>

                @foreach ($categories as $category)

                <li><a href="/category/{{ $category->id }}">{{$category->name}}</a></li>

                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->