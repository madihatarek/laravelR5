     <!-- start nav bar -->

     <!--  class="{{ Route::is('') ? 'active' : '' }}" ==> reqeust active class or not... -->

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Clients</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('addClient') ? 'active' : '' }}"><a href="{{ route('addClient') }}">Add</a></li>                
                <li class="{{ Route::is('clients') ? 'active' : '' }}"><a href="{{ route('clients') }}">Clients</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>

    <!-- end nav bar -->