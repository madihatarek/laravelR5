     <!-- start nav bar -->

     <!--  class="{{ Route::is('') ? 'active' : '' }}" ==> reqeust active class or not... -->

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Students</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('addStudent') ? 'active' : '' }}"><a href="{{ route('addStudent') }}">Add Student</a></li>                
                <li class="{{ Route::is('students') ? 'active' : '' }}"><a href="{{ route('students') }}">Students</a></li>
                <li class="{{ Route::is('trashStudent') ? 'active' : '' }}"><a href="{{ route('trashStudent') }}">Trashed</a></li>
            </ul>
        </div>
    </nav>

    <!-- end nav bar -->