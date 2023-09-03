<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="First Space Art exhibition in Karawang">
    <meta name="keywords" content="nava exhibition, space art, nava, art exhibition, space art karawang">
    <meta name="author" content="sangkuriang tech">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}">
    <title>@yield('page-title')</title>
  </head>
  <style>
    html{
        scroll-behavior: smooth;
    }
    .fs-montserrat{
        font-family: 'Montserrat';
    }
  </style>
  @stack('css')
  <body style="background-color: #070d3d">
    @include('sweetalert::alert')
      <nav class="navbar navbar-dark fixed-top p-2" style="background-color: #070d3d">
            <div class="container">
            <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo-navy.jpg') }}" width="150" height="60" class="d-inline-block align-top" alt="">
            </a>
        </div>
        </nav>

        @yield('content')

        <footer>
            <div class="container fs-montserrat text-center text-white">
                <p>NAVA Exhibition is Organized by Great A Creative</p>
                <div class="d-flex justify-content-center mb-2">
                    <a href="https://www.instagram.com/navaexhibition/">
                        <p class="text-white">Instagram |</p>
                    </a>
                    <a href="/faq">
                        <p class="text-white">&nbsp;FAQ |</p>
                    </a>
                    <a href="https://wa.me/6285703485467">
                        <p class="text-white">&nbsp;Contact Us</p>
                    </a>
                </div>
            </div>
        </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    @stack('js')
  </body>
</html>