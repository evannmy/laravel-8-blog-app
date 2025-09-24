<div
  class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary mt-5"
>
  <div
    class="offcanvas-md offcanvas-end bg-body-tertiary"
    tabindex="-1"
    id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel"
  >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">
        Laravel 8 Blog
      </h5>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas"
        data-bs-target="#sidebarMenu"
        aria-label="Close"
      ></button>
    </div>
    <div
      class="offcanvas-body d-md-flex flex-column p-0 pt-2 overflow-y-auto ps-2"
    >
      <ul class="navbar-nav flex-column mx-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
            <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <i class="bi bi-card-text"></i> My Posts
          </a>
        </li>
        @can('admin-access')
          <h6 class="sidebar-heading text-body-secondary text-uppercase my-3">Administrator</h6>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <i class="bi bi-grid-fill"></i> Categories
            </a>
          </li>
        @endcan
        <hr class="my-2" />
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button class="nav-link" type="submit">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
      {{-- <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase"
              >
                <span>Saved reports</span>
              </h6> --}}
    </div>
  </div>
</div>