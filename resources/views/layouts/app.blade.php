{{-- template aplikasi --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="icon" href="/images/targaryenLogo.png" type="image/png" />
    <title>@yield('title')</title>

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style') {{-- @include dimulai dari folder "views" --}}
    @stack('addon-style')

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    
  </head>

  <body>
    {{-- navbar --}}
    @include('includes.navbar')

    <!-- page content (gambar utama) -->
    @yield('content') {{-- tampilan yield dinamis, disesuaikan dengan sectionnya --}}

    {{-- footer --}}
    @include('includes.footer')

    {{-- script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
    {{-- trix editor --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
  </body>
</html>
