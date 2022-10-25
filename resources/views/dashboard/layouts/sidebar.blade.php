<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <!-- kalau requestnya dasboard, maka tampilkan kelas active -->
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/mypost*') ? 'active' : '' }}" href="/dashboard/mypost">
                <span data-feather="file-text"></span>
                My CAPA
              </a>
            </li>
        </ul>

        @can('admin')
        <h3 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h3>

        <ul class="nav flex-column">
          <li class="nav-item">
            <!-- kalau requestnya dasboard.posts, maka tampilkan kelas active -->
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="file-text"></span>
              All Post
            </a>
          </li>
          <li class="nav-item">
            <!-- kalau requestnya dasboard.posts, maka tampilkan kelas active -->
            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
              <span data-feather="file-text"></span>
              All User
            </a>
          </li>
          <li class="nav-item">
              <!-- kalau requestnya dasboard.posts, maka tampilkan kelas active -->
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="file-text"></span>
               Categories
            </a>
          </li>
        </ul>
          <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
          </ul> -->
        @endcan
    </div>
</nav>       