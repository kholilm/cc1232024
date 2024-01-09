<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/templated/dist/img/cc123.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family:Copperplate;">Balikpapan</span>
    </a>

    <!-- Sidebar -->
    <div class="user-panel pb-2 mb-2 d-flex">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <br>
            <li class="nav-item">
                <a href="/view-dashboard" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
        </ul>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">DATA</li>
            <li class="nav-item">
                <a href="/view-inputnews" class="nav-link {{ $title === 'InputNews' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Input News
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/view-banding" class="nav-link {{ $title === 'Banding' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Banding
                    </p>
                </a>
            </li>

            @can('admin')
                <li class="nav-item">
                    <a href="/view-inputdata" class="nav-link {{ $title === 'Input-Data' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Input Sidebar
                        </p>
                    </a>
                </li>
            @endcan

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
