<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="First Space Art exhibition in Karawang">
    <meta name="keywords" content="deluna karawang, festival musik karawang, deluna music fest, festival musik deluna">
    <meta name="author" content="sangkuriang tech">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="De Luna Music Fest 2024" />
    <meta property="og:type" content="Music Festival" />
    <meta property="og:description" content="Festival musik yang memperkenalkan tema modern dan berbeda dari festival musik pada umumnya." />
    <meta property="og:url" content="https://delunamusicfest.com" />
    <meta property="og:image" content="https://delunamusicfest.com/img/banner.jpg" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Balsamiq Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}">
    <title>@yield('page-title')</title>
  </head>
  <style>
    html{
        scroll-behavior: smooth;
    }
    .fs-montserrat{
        font-family: 'Balsamiq Sans';
    }
    .fs-head{
      font-family: 'Kanit';
      font-weight: 800;
    }
    #btn-ticket:hover{
            background-color: white;
            color: black;
    }
  </style>
  @stack('css')
  <body style="background-color: #E42864">
    @include('sweetalert::alert')
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #E42864">
        <div class="container">
          <a class="navbar-brand fs-head" href="/">
            <img src="{{ asset('img/login.png') }}" width="100" height="70" alt="foto">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#ticket">Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#maps">Maps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/check-ticket">Ticket Checking</a>
            </li>
          </ul>
        </div>
        </div>
      </nav>

        @yield('content')

        <footer style="background-color: #5e5fd8; padding: 10px">
            <div class="container fs-montserrat text-center text-white mt-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex"> 
                    <h5 class="fs-head">DE LUNA</h5>
                    <small>&copy;2024</small>
                  </div>
                  
                  <div class="d-flex mb-2">
                    <a  href="https://www.instagram.com/deluna.land2024/">
                        <i class="bi bi-instagram text-white pr-3" style="font-size: 1.8em;"></i>
                    </a>
                    <a  href="#">
                        <i class="bi bi-facebook text-white p-3" style="font-size: 1.8em;"></i>
                    </a>
                    <a  href="#">
                        <i class="bi bi-twitter text-white p-3" style="font-size: 1.8em;"></i>
                    </a>
                    <a href="https://wa.me/6285283940573">
                      <i class="bi bi-whatsapp text-white p-3" style="font-size: 1.8em;"></i>
                    </a>
                </div>
                <div class="d-flex">
                  <small>Created&Produced By: </small>
                    <p class="fs-montserrat">&nbsp;Great A Creative</p>
                </div>
                <div class="d-flex">
                  <a href="/faq" class="text-white text-left text-md-right">
                    <p class="fs-head">Ketentuan dan Persyaratan</p>
                  </a>
                </div>
                
                </div>
                
                <div class="col-md-6">
                  <div class=" text-right">
                    <a class="text-white" href="https://dutanugraha82.github.io/"><small>Sangkuriang Tech, 2024</small></a>
                    
                              
                  </div>
                </div>
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