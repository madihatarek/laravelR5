     <!-- start nav bar -->

     <!--  class="{{ Route::is('') ? 'active' : '' }}" ==> reqeust active class or not... -->

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div>
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('messages') ? 'active' : '' }}"><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
                    <li class="{{ Request::is('messages') ? 'active' : '' }}"><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">  عربي  </a></li>
    
                </ul>
            </div>
            <br><br><br>
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Clients</a>
            </div>
        
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('clients') ? 'active' : '' }}"><a href="{{ route('clients') }}">Clients</a></li>
                <li class="{{ Route::is('addClient') ? 'active' : '' }}"><a href="{{ route('addClient') }}">Add Client</a></li>
                <li class="{{ Route::is('trashClient') ? 'active' : '' }}"><a href="{{ route('trashClient') }}">Trash</a></li>
                @yield('menu')
                @stack('submenu')
            </ul>
        </div>
    </nav>

    <!-- end nav bar -->