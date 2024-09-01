@extends('master')
@push('css')
@endpush
@section('page-title')
    Psychoforia
@endsection
@section('content')
<div style="margin-top: 100px;" id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 55vh;">
            <img src="{{ asset('img/banner.png') }}" class="mx-auto d-block " style="width:95vw; height:100%; border-radius:15px; object-fit: cover;" alt="image">
          </div>
          <div class="carousel-item" style="height: 55vh;">
            <img src="{{ asset('img/banner.png') }}" class="mx-auto d-block " style="width:95vw; height:100%; border-radius:15px; object-fit: cover;" alt="image">
          </div>
          <div class="carousel-item" style="height: 55vh;">
            <img src="{{ asset('img/banner.png') }}" class="mx-auto d-block " style="width:95vw; height:100%; border-radius:15px; object-fit: cover;" alt="image">
          </div>
        </div>
       <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
</div>
<div class="container my-5" id="ticket">
    
    <h2 class="text-white text-center text-md-left fs-head mb-3" style="letter-spacing: 3px">Get The Ticket Here</h2>
    <div class="row">
       @foreach ($tickets as $item)
       <div class="col-md-6 mb-5 mt-5 mb-md-0">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="{{ asset('storage'.'/'.$item->foto) }}" class="card-img-top" alt="ticket">
            <div class="card-body">
              <h5 class="card-title fs-head">{{ $item->nama }}</h5>
              @if ($item->slot <= 10 && $item->slot > 1)
              <p class="card-text" style="font-size: 0.9em;">{{ Carbon\Carbon::parse($item->available)->format('d M Y') }} - {{ Carbon\Carbon::parse($item->expired)->format('d M Y')}} <br> <b>{{"Rp ". $item->harga }}</b> <br> Available Ticket : {{ $item->slot }} pcs &#128543; <br> Tiket Menipis Guys!</p>
              @elseif($item->slot > 10)
              <p class="card-text" style="font-size: 0.9em;">{{ Carbon\Carbon::parse($item->available)->format('d M Y') }} - {{ Carbon\Carbon::parse($item->expired)->format('d M Y')}} <br> <b>{{"Rp ". $item->harga }}</b> <br> Tiket Terbatas, Selagi masih ada nih &#128513;</p>
              @elseif($item->slot < 1)
              <p class="card-text" style="font-size: 0.9em;">{{ Carbon\Carbon::parse($item->available)->format('d M Y') }} - {{ Carbon\Carbon::parse($item->expired)->format('d M Y')}} <br> <b>{{"Rp ". $item->harga }}</b> <br> Available Ticket : {{ $item->slot }} pcs &#128543; <br> Tiket Tidak Tersedia.</p>
              @endif
              @if ($item->status == "1" && $item->slot > 0)
              <a href="/tickets/{{ $item->id }}" class="btn d-block fs-head" style="background-color: #5e5fd8; color:white" id="btn-ticket">Grab This</a>
              @else
              <a href="#" class="btn d-block fs-head" style="background-color: #f4e21d; color:rgb(0, 0, 0)" id="btn-ticket">Sorry &#128549;</a>
              @endif
            </div>
          </div>
    </div>
       @endforeach
    </div>
</div>

<div class="container my-5" id="maps">
    <h2 class="fs-head text-center text-white text-md-left mb-3" style="letter-spacing: 3px">Festival Location</h2>
    <iframe style="border-radius:15px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.542837501017!2d107.29873607499114!3d-6.323615493665882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69762d4c316603%3A0x50a8005dfd52a897!2sBuana%20Perjuangan%20University!5e0!3m2!1sen!2sid!4v1725162778962!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

  <div class="container mt-5">
    <h2 class="fs-head text-center text-white text-md-left mb-3" style="letter-spacing: 3px">What's In It?</h2>
   <div class="row">
    <div class="col mb-4 mb-md-0">
        <img class=" d-block mx-auto" src="{{ asset('img/konser.jpg') }}" style="width: 20rem; border-radius:15px" alt="concert">
        <figcaption class="text-white text-center">Music Concert</figcaption>
    </div>
    <div class="col mb-4 mb-md-0">
        <img class=" d-block mx-auto" src="{{ asset('img/shop.jpg') }}" style="width: 20rem; border-radius:15px" alt="shop">
        <figcaption class="text-white text-center">Market Shop</figcaption>
    </div>
    <div class="col mb-4 mb-md-0 ">
        <img class=" d-block mx-auto" src="{{ asset('img/food.jpg') }}" style="width: 20rem; border-radius:15px" alt="food">
        <figcaption class="text-white text-center">Food Tenant</figcaption>
    </div>
    <div class="col mb-4 mt-3 mb-md-0">
        <img class="d-block mx-auto " src="{{ asset('img/playground.jpg') }}" style="width: 20rem; border-radius:15px" alt="playground">
        <figcaption class="text-white text-center">Playground</figcaption>
    </div>
   </div>
</div>

<div class="container" style="margin-top: 100px;"> <h2 class="text-white text-center fs-head mb-3" id="about">Psychoforia is an event organized by students of the faculty of psychology, University of Buana Perjuangan Karawang.</h2></div>
<div class="container mb-5" style="margin-top: 150px">
    <h3 class="fs-montserrat text-center text-white"><i>Created & Produced by:</i></h3>
    <div class="container"><p class="fs-montserrat text-center text-white mt-4" style="font-size: 2em; letter-spacing: 10px"><b>Faculty of Psychology</b></p></div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush