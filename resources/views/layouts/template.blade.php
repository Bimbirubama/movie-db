<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movie DB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-success navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Movie DB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>

          @auth
          <li class="nav-item">
            <a class="nav-link @yield('navMovie')" href="{{ route('movies.index') }}">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('navCategory')" href="{{ route('categories.index') }}">Categories</a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><span class="dropdown-item text-muted">{{ Auth::user()->email }}</span></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        @else
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
        @endauth

        <form class="d-flex ms-lg-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  {{-- Main content --}}
  <div class="container my-4">
    @yield('content')
  </div>

  {{-- Footer --}}
  <footer class="bg-success text-white text-center py-2">
    &copy; 2025 - Manajemen Informatika 2A
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
