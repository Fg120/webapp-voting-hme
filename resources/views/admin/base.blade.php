<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy"
          content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>@yield('title') - Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    {{-- ADDON LINK --}}
    @yield('link')

</head>

<body>
    @include('sweetalert::alert')

    {{-- HEADER --}}
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6"
           style="pointer-events: none">
            Voting
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search"> --}}
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="{{ route('auth.logout') }}"
                      method="get">
                    @csrf
                    <button class="nav-link px-3">Sign out</button>
                </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- SIDEBAR --}}
            <nav id="sidebarMenu"
                 class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <div class="nav-link">
                                <h6>Voting</h6>
                                {{ auth()->user()->nama }} <br>
                                {{-- {{ auth()->user()->email }} --}}
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}"
                               href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-fill align-text-bottom"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(2) == 'user' ? 'active' : '' }}"
                               href="{{ route('admin.mahasiswa.index') }}">
                                <i class="bi bi-people-fill align-text-bottom"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(2) == 'category' ? 'active' : '' }}"
                               href="{{ route('admin.kandidat.index') }}">
                                <i class="bi bi-grid-fill align-text-bottom"></i>
                                Kandidat
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span>Etc</span>
                        <a class="link-secondary"
                           href="#"
                           aria-label="Add a new report">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="24"
                                 height="24"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="feather feather-plus-circle align-text-bottom"
                                 aria-hidden="true">
                                <circle cx="12"
                                        cy="12"
                                        r="10"></circle>
                                <line x1="12"
                                      y1="8"
                                      x2="12"
                                      y2="16"></line>
                                <line x1="8"
                                      y1="12"
                                      x2="16"
                                      y2="12"></line>
                            </svg>
                        </a>
                    </h6>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                {{-- CONTENT --}}
                @yield('content')
            </main>
        </div>
    </div>

    {{-- FOOTER --}}
    {{-- @include('includes.admin.footer') --}}

    {{-- DEFAULT SCRIPT --}}
    {{-- @include('includes.admin.script') --}}
</body>

</html>
