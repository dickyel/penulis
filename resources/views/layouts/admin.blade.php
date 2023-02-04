<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    @stack('prepend-style')
    <link href="{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.css') }}" rel="stylesheet" />
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    @include('style.style')
    @stack('addon-style')
    <title>@yield('title')</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <aside class="sidebar">
                <a href="{{ route('admin-dashboard') }}" class="sidebar-logo">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('./assets/img/logo.png') }}" alt="">
                        <span style="color: #FD3F3F;">Pen</span><span style="color: #3174D9; margin:0;">ulis</span>
                    </div>

                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="./assets/img/global/navbar-times.svg" alt="">
                    </button>
                </a>

                <h5 class="sidebar-title">Halaman menu utama</h5>

                <a href="{{ route('admin-dashboard') }}" class="sidebar-item active" onclick="toggleActive(this)">
                    
                    <img src="assets/img/home/" alt="">
                    <span>Beranda</span>
                </a>

                
                <a href="{{ route('category.index') }}" class="sidebar-item" onclick="toggleActive(this)">
                    <i class="fa-solid fa-bars"></i>
                    <span>Kategori</span>
                </a>

                <a href="{{ route('galery.index') }}" class="sidebar-item" onclick="toggleActive(this)">
                    <i class="fa-light fa-image"></i>
                    <span>Foto</span>
                </a>

                <a href="{{ route('content.index') }}" class="sidebar-item" onclick="toggleActive(this)">
                   
                    <i class="fa-light fa-folder-grid"></i>

                    <span>Konten</span>
                </a>

                <a href="{{ route('user.index') }}" class="sidebar-item" onclick="toggleActive(this)">
                   
                    <i class="fa-light fa-folder-grid"></i>

                    <span>Konten</span>
                </a>


                <a href="#" class="sidebar-item" onclick="toggleActive(this)">
                    <i class="fa-regular fa-right-from-bracket"></i>

                    <span>Logout</span>
                </a>

            </aside>

        </div>

        @yield('content')
        
    </div>

    @stack('prepend-style')
    @include('script.script')
    <script src="{{ asset('./vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('./vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-style')
</body>

</html>