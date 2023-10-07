<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item {{ Route::currentRouteName() == "dashboard"? 'active': '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item  {{ (in_array( Route::currentRouteName(), ["food-index", 'food-create', 'food-edit']))? 'active': '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Foods</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::currentRouteName() == "food-index" ? 'active': '' }}"><a class="nav-link" href="{{ route('foods-index') }}" class="nav-link">View All</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == "food-create" ? 'active': '' }}"><a class="nav-link" href="{{ route('food-create') }}">Create New</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ (in_array(Route::currentRouteName(), ['foods_type_create', 'foods_type', 'foods_type_edit'] )) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#foods_type" aria-expanded="false" aria-controls="foods_type">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Foods Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="foods_type">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::currentRouteName() == "foods_type_create" ? 'active': '' }} "><a class="nav-link" href="{{route('foods_type_create')}}" class="nav-link">Create New</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == "foods_type" ? 'active': '' }}"><a class="nav-link" href="{{ route('foods_type')  }}" class="nav-link">View All</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ (in_array(Route::currentRouteName(), ['gallery-index', 'gallery-create', 'gallery-edit'])) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
                <span class="icon-bg"><i class="mdi mdi-image menu-icon"></i></span>
                <span class="menu-title">Gallery</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gallery">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::currentRouteName() == 'gallery-index' ? 'active': '' }}"><a class="nav-link" href="{{ route('gallery-index') }}" class="nav-link">View all</a></li>
                    <li class="nav-item {{ Route::currentRouteName() === 'gallery-create'? 'active': '' }} {{ Route::currentRouteName() }}">
                        <a class="nav-link" href="{{ route('gallery-create') }}" class="nav-link">Create New</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ (in_array(Route::currentRouteName(), ['links_index', 'links_create', 'links_edit'])) ? 'active' : '' }}">
            <a href="#links" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="links">
                <span class="icon-bg"><i class="mdi mdi-image menu-icon"></i></span>
                <span class="menu-title">Links</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="links">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::currentRouteName() == 'links_create'? 'active' : '' }}">
                        <a href="{{ route('links_create') }}" class="nav-link">Create</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'links_index' ? 'active' : '' }}">
                        <a href="{{ route('links_index') }}" class="nav-link">View All</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="sidebar-profile-img">
{{--                                <img src="" alt="image">--}}
                            </div>
                            <div class="sidebar-profile-text">
                                <p class="mb-1">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
{{--                    <div class="badge badge-danger">3</div>--}}
                </div>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="{{ route('user_profile') }}" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Profile</span>
                </a>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Settings</span>
                </a>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Log Out</span></a>
                <form id="logout" action="{{ route('logout') }}" method="post" hidden>
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
