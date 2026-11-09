 @props(['app_name'])
 <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">{{ $app_name}}</a>
    <div class="d-flex align-items-center justify-content-center gap-3">
      <form class="d-flex" role="search">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn btn-danger" type="submit">Logout</button>
    </form>
    </div>
  </div>
</nav>