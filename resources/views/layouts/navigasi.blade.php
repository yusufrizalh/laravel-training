<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Inixindo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('posts') ? 'active' : '' }}" href="/posts">Posts</a>
            </li>
        </ul>
    </div>
</nav>
