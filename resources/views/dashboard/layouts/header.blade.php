<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Main Account</a>
  
  
  <div class="btn-group px-3">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
    {{ auth()->user()->name }}
    </button>
    <ul class="dropdown-menu dropdown-menu-start">
      <li>
          <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item" >Logout<span data-feather="logout"></span></button>
          </form>
      </li>
      <!-- <li><button class="dropdown-item" type="button">Another action</button></li>
      <li><button class="dropdown-item" type="button">Something else here</button></li> -->
    </ul>
  </div>
</header>