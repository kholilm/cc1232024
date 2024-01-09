<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="view-inputnews" class="nav-link {{ $title === 'News' ? 'active' : '' }}">News</a>
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
    </ul>

</nav>
