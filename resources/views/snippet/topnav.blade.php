<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-film mr-2"></i>
            ResuMuse
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 @if(Route::current()->getName() == 'templates') active @endif" aria-current="page" href="{{ route('templates') }}">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 @if(Route::current()->getName() == 'applicants') active @endif" href="{{ route('applicants') }}">Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 @if(Route::current()->getName() == 'configuration') active @endif" href="{{ route('configuration') }}">Config</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 @if(Route::current()->getName() == 'profile') active @endif" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


