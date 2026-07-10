<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="icon" href="/images/targaryenLogo.png" type="image/png" />
    <title>@yield('title')</title>

    @stack('prepend-style')
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <link href="/style/main.css" rel="stylesheet" />

      {{-- datatables --}}
      <link href="https://cdn.datatables.net/v/bs4/dt-2.3.2/datatables.min.css" rel="stylesheet" integrity="sha384-fE7frHQNLGzNl8eKcpGtCoE9nL3u5ijqXo8qfQhibuVrrUk9S+YNzm15kj8XPkJr" crossorigin="anonymous"> 

      {{-- trix editor --}}
      <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/targaryenLogoDashboard.png" alt="" class="my-4" />
          </div>
          <!-- untuk menambahkan menu pada sidebar -->
          <div class="list-group list-group-flush">
            <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}">Categories</a>
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">Products</a>
            <a href="{{ route('product-gallery.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}">Galleries</a>
            <a href="#" class="list-group-item list-group-item-action">Transactions</a>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}">Users</a>
            <a href="#" class="list-group-item list-group-item-action">Sign Out</a>
          </div>
        </div>

        <!-- page content -->
        <div id="page-content-wrapper">
          <!-- navigation -->
          <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">&laquo; Menu</button>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- desktop menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <!-- fungsi d-none adalah agar tampilan tidak muncul di versi mobile -->
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropDown" role="button" data-toggle="dropdown">
                      <img src="/images/daemon_pfp.jpg" alt="" class="rounded-circle mr-2 profile-picture" />
                      Hi, Wak
                    </a>
                    <div class="dropdown-menu">
                      <a href="#" class="dropdown-item">Logout</a>
                    </div>
                  </li>
                </ul>

                <!-- mobile menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <!-- agar hanya muncul dilayar kecil (layar mobile) maka diberikan class d-lg-none agar tidak muncul di large screen -->
                  <li class="nav-item">
                    <a href="#" class="nav-link">Hi, Wak</a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block">Cart</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          {{-- content --}}
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    
        <script src="/vendor/jquery/jquery.min.js"></script> <!-- sebelumnya menggunakan jquery.slim.min.js tapi diganti ke jquery biasa karena sudah ada beberapa modul jquery slim di datatables yang kita panggil -->
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        {{-- datatables --}}
        <script src="https://cdn.datatables.net/v/bs4/dt-2.3.2/datatables.min.js" integrity="sha384-XCm0OMKqt/5lsXFDSL+83p4zx4Mb5SwKLZQzOW96xQUOaqaIl4x8j5ntyRAfyQl9" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>

        <!-- script jquery untuk memunculkan dan menghilangkan sidebar menu versi mobile -->
        <script>
        // menargetkan id menu-toggle saat di click
        $('#menu-toggle').click(function (e) {
            e.preventDefault(); // dibuat default dahulu karena kita tidak ingin behaviour tombol yg sebenarnya berjalan
            $('#wrapper').toggleClass('toggled');
        });
        </script>

        {{-- trix editor --}}
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    @stack('addon-script')
  </body>
</html>
