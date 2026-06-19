<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ auth()->check() ? route('dashboard') : route('login') }}">
      Laravel Property ERP
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto">
        @auth
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('dashboard') }}">
              <i class="fa fa-chart-pie opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Dashboard
            </a>
          </li>
        @endauth
        @guest
          <li class="nav-item">
            <a class="nav-link me-2" href="{{ route('register') }}">
              <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{ route('login') }}">
              <i class="fas fa-key opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Sign In
            </a>
          </li>
        @endguest
      </ul>
      <ul class="navbar-nav d-lg-block d-none">
        <li class="nav-item">
          <a href="https://github.com/ardiwiraansori/laravel-property-erp-demo" target="_blank" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-{{ (Request::is('static-sign-up') ? 'light' : 'dark') }}">GitHub Repo</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
