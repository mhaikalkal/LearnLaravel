<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Haikal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Agar itunya setiap pindah page class active-nya pindah kita coba pakai ternary -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "Home") ? 'active' : '' }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active === "About") ? 'active' : '' }}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active === "Blog") ? 'active' : '' }}" href="/posts">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active === "Categories") ? 'active' : '' }}" href="/categories">Categories</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
