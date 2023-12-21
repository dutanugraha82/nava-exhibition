@extends('master')
@push('css')
@endpush
@section('page-title')
    De Luna Music Fest
@endsection
@section('content')
<div style="margin-top: 100px;" id="home">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/banner.jpg') }}" class="d-block w-100" alt="deluna">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="deluna">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/banner3.jpg') }}" class="d-block w-100" alt="deluna">
          </div>
        </div>
       <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
</div>
<div class="container my-5" id="ticket">
    
    <h2 class="text-white text-center text-md-left fs-head mb-3" style="letter-spacing: 3px">Get The Ticket Here</h2>
    <div class="row">
       @foreach ($tickets as $item)
       <div class="col mb-4 mb-md-0">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="{{ asset('storage'.'/'.$item->foto) }}" class="card-img-top" alt="ticket">
            <div class="card-body">
              <h5 class="card-title fs-head">{{ $item->nama }}</h5>
              <p class="card-text" style="font-size: 0.9em;">{{ Carbon\Carbon::parse($item->available)->format('d M Y') }} - {{ Carbon\Carbon::parse($item->expired)->format('d M Y')}} <br> <b>{{"Rp ". $item->harga }}</b> <br> Available Ticket : {{ $item->slot }} pcs</p>
              @if ($item->status == "1" && $item->slot > 0)
              <a href="/tickets/{{ $item->id }}" class="btn d-block fs-head" style="background-color: #6360e1; color:white" id="btn-ticket">Grab This</a>
              @else
              <a href="#" class="btn d-block fs-head" style="background-color: #f4e21d; color:rgb(0, 0, 0)" id="btn-ticket">Sorry ):</a>
              @endif
            </div>
          </div>
    </div>
       @endforeach
    </div>
</div>

<div class="container my-5" id="maps">
    <h2 class="fs-head text-center text-white text-md-left mb-3" style="letter-spacing: 3px">Festival Location</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.525967119145!2d107.28960877459089!3d-6.3258146618975255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977e946b3fcd3%3A0xce56ecfbd0ae019b!2sStreet%20carnival!5e0!3m2!1sen!2sid!4v1702927388808!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="container mt-5">
    <h2 class="fs-head text-center text-white text-md-left mb-3" style="letter-spacing: 3px">What's In It?</h2>
   <div class="row">
    <div class="col mb-4 mb-md-0">
        <img class="rounded d-block mx-auto" src="{{ asset('img/konser.jpg') }}" style="width: 20rem;" alt="concert">
        <figcaption class="text-white text-center">Music Concert</figcaption>
    </div>
    <div class="col mb-4 mb-md-0">
        <img class="rounded d-block mx-auto" src="{{ asset('img/shop.jpg') }}" style="width: 20rem;" alt="shop">
        <figcaption class="text-white text-center">Market Shop</figcaption>
    </div>
    <div class="col mb-4 mb-md-0 ">
        <img class="rounded d-block mx-auto" src="{{ asset('img/food.jpg') }}" style="width: 20rem;" alt="food">
        <figcaption class="text-white text-center">Food Tenant</figcaption>
    </div>
    <div class="col mb-4 mt-3 mb-md-0">
        <img class="d-block mx-auto rounded" src="{{ asset('img/playground.jpg') }}" style="width: 20rem;" alt="playground">
        <figcaption class="text-white text-center">Playground</figcaption>
    </div>
   </div>
</div>
<div class="container" style="margin-top: 100px;"> <h2 class="text-white text-center fs-head mb-3" id="about">"De`LUNA 2024" aims to be a means of
    introducing the modernization of a music performance.</h2></div>
<div class="container mb-5" style="margin-top: 150px">
    <h3 class="fs-montserrat text-center text-white"><i>Created & Produced by:</i></h3>
    <div class="container"><p class="fs-montserrat text-center text-white mt-4" style="font-size: 2em; letter-spacing: 10px"><b>Great A Creative</b></p></div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush