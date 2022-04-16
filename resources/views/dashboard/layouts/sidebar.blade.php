<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                {{--  kalau url-nya is /dashboard maka assign class active --}}
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
                </a>
            </li>
            <li class="nav-item">
                {{-- Pake * , artinya apapun yang ada setelah posts akan dianggap posts --}}
                {{-- soalnya kan update,create,delete sub dari posts --}}
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file-text"></span>
                My Posts
                </a>
            </li>
        </ul>

        {{-- $admin ini dari gate::define('admin', .....) --}}
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
                <span data-feather="grid"></span>
                Categories
                </a>
            </li>
        </ul>
        @endcan

    </div>
</nav>
