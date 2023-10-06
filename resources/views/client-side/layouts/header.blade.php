<header class="{{ Route::currentRouteName() == 'index' ? 'index-header' : 'page-header' }}">
    <div class="container">
        <div class="row">
            <div id="Logo" class="col-lg-2 col-4">
                <a href="#">
                    <img src="{{ asset('client-side/dist/images/logo.png') }}" alt="" title="">
                </a>
            </div>
            <div id="MainNav" class="col-lg-7 col-sm-6 col-8">
                <ul>
                    @if( isset($menus) )

                        @foreach($menus as $menu)
                            <li class="{{ Route::current()->uri() == $menu->href ? 'active': '' }}"><a href="{{ $menu->href }}">{{ $menu->title }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="HeadBtnArea" class="col-lg-3 col-8">
                <a href="#" class="HeadBtnLink">Order Online</a>
                <div class="CartBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <g id="shop" transform="translate(-1496 -1983)">
                            <rect id="Rectangle_3" data-name="Rectangle 3" width="26" height="26" transform="translate(1496 1983)" fill="none"></rect>
                            <path id="Rectangle_4" data-name="Rectangle 4" d="M4-1h9a5.006,5.006,0,0,1,5,5v6a5.006,5.006,0,0,1-5,5H4a5.006,5.006,0,0,1-5-5V4A5.006,5.006,0,0,1,4-1Zm9,14a3,3,0,0,0,3-3V4a3,3,0,0,0-3-3H4A3,3,0,0,0,1,4v6a3,3,0,0,0,3,3Z" transform="translate(1501 1991)" fill="currentColor"></path>
                            <path id="Path_8" data-name="Path 8" d="M16.255,11.223a1,1,0,0,1-1-1v-3.1A3.127,3.127,0,1,0,9,7.127v3.1a1,1,0,0,1-2,0v-3.1a5.127,5.127,0,1,1,10.255,0v3.1A1,1,0,0,1,16.255,11.223Z" transform="translate(1497.127 1983)" fill="currentColor"></path>
                        </g>
                    </svg>
                    <span>3</span>
                </div>
                <div class="MobileNavBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z" fill="currentColor"></path></svg>
                </div>
            </div>
        </div>
    </div>
</header>
