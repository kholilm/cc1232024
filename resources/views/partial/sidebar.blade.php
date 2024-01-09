<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/templated/dist/img/cc123.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family:Copperplate;">Balikpapan</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @php

                    use Illuminate\Support\Facades\DB;
                    $segment = Request::segment(2);
                    $menuid = DB::table('tb_sop')
                        ->where('url', $segment)
                        ->get()
                        ->first()->menu_id;
                @endphp



                @php
                    use App\Models\ShowPdfModel;
                    $sidemenu = ShowPdfModel::where('jenis_menu', 'side-bar')
                        ->where('is_active', 1)
                        ->orderBy('sort_menu', 'asc')
                        ->get();

                @endphp
                @foreach ($sidemenu as $side)
                    <li class="nav-item {{ $side->id == $menuid ? 'menu-open' : null }}">
                        <a href="#" class="nav-link">
                            <i class="{{ $side->icon }}"></i>
                            <p>
                                {{ $side->menu }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @php
                            $parents = DB::table('tb_sop')
                                ->where('menu_id', $side->id)
                                ->orderBy('sort_menu', 'asc')
                                ->where('is_active', 1)
                                ->get();
                        @endphp
                        @foreach ($parents as $ps)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/show-pdf/{{ $ps->url }}"
                                        class="nav-link {{ $ps->url == $segment ? 'active' : null }}">
                                        <i class="{{ $ps->icon }}"></i>
                                        <p>{{ $ps->menu }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
