<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MiraTara Fashion')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themify-icons/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nav_carousel_style.css') }}" />
    @stack('styles')
    
    <style>
        /* Main content offset for fixed navbar */
        body {
            padding-top: 80px; /* Adjust this value based on your navbar height */
        }
        
        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1030;
        }
        
        /* Main content wrapper */
        .main-content {
            min-height: calc(100vh - 80px);
        }
        
        /* Responsive navbar padding */
        @media (max-width: 991.98px) {
            body {
                padding-top: 70px;
            }
            .main-content {
                min-height: calc(100vh - 70px);
            }
        }
        
        @media (max-width: 575.98px) {
            body {
                padding-top: 65px;
            }
            .main-content {
                min-height: calc(100vh - 65px);
            }
        }
    </style>
</head>
<body>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    
    <section id="header">
        <nav class="navbar navbar-expand-lg fixed-top bg-white">
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href="{{ route('homepage') }}">
                    <img src="{{ asset('images/logo1.png') }}" alt="Logo" height="40" />
                </a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-center mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 @if(Request::routeIs('homepage')) active @endif" 
                               aria-current="page" href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-lg-2" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Women's
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Dresses</a></li>
                                <li><a class="dropdown-item" href="#">Skirt</a></li>
                                <li><a class="dropdown-item" href="#">Sweaters</a></li>
                                <li><a class="dropdown-item" href="#">Jackets</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-lg-2" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Accessories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Jewelry</a></li>
                                <li><a class="dropdown-item" href="#">Shoes</a></li>
                                <li><a class="dropdown-item" href="#">Bags</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                @auth
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="nav-login-button border-0">Logout</button>
                </form>
                @else
                <a href="{{ route('login_page') }}" class="nav-login-button me-2">Login</a>
                <a href="{{ route('register_page') }}" class="nav-login-button">Register</a>
                @endauth
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </section>

    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    @stack('scripts')
</body>
</html>