<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
  <div class="container col-10">
    <a class="navbar-brand">Laravel 8</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link {{ ($active == 'home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        <a class="nav-link {{ ($active == 'about') ? 'active' : '' }}" href="/about">About</a>
        <a class="nav-link {{ ($active == 'blog') ? 'active' : '' }}" href="/blog">Blog</a>
        <a class="nav-link {{ ($active == 'categories') ? 'active' : '' }}" href="/categories">Categories</a>
      </div>
      @auth
        <div class="nav-item dropdown ms-auto">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ auth()->user()->username }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <div class="navbar-nav ms-auto">
          <a class="nav-link {{ ($active == 'login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>
      @endauth
    </div>
  </div>
</nav>