<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="view-tab" class="nav-link {{ $title === 'Tab' ? 'active' : '' }}">Tab</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="view-notif" class="nav-link {{ $title === 'Notif' ? 'active' : '' }}">Notif</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="view-news" class="nav-link {{ $title === 'News' ? 'active' : '' }}">News</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="view-sop" target="_blank" class="nav-link">Sop</a>
        </li> --}}

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto">
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hi, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/view-dashboard"><i class="bi bi-layout-text-sidebar"></i>
                            Input Data
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/login" class="nav-link {{ $title === 'Login' ? 'active' : '' }}"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
                <!-- <a href="#" onclick="inputdata()" class="nav-link">Input Data</a> -->
            </li>
        @endauth

        <!-- fulscrenn bos -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>

</nav>
