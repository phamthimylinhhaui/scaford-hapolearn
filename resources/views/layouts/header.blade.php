<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
            <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="HapoLearn Logo">
        </a>
        <button id="jqueryBtn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="btn-exit active" id="exit" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-times"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('courses.index') }}">All Courses</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <button class="nav-link btn-logout" data-toggle="modal" data-target="#logout">{{ __('button.logout') }}</button>
                    </li>
                    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Bạn có chắc chắn muốn đăng xuất không?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('logout') }}" class="float-right">
                                        @csrf
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('button.no') }}</button>
                                        <button type="submit" class="btn btn-danger btn-yes-delete">{{ __('button.yes') }}</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('login') }}">LOGIN</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('profile.index') }}">Profile</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
