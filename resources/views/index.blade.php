@extends('master')
@push('css')
    <style>
        .banner{
        height: 95vh;
        background-image: url("/img/banner.jpg");
        background-position: center;
        mix-blend-mode: lighten;
        opacity: 0.4;
        background-size: cover;
        filter: saturate(200%);
    }

    .banner-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    }
    </style>
@endpush
@section('page-title')
    Nava Exhibition
@endsection
@section('content')
<div class="banner" style="margin-top: 5rem;">
</div>
<div class="banner-content" style="position: absolute; top: 58%; left: 50%; transform: translate(-50%, -50%);">
    <img class="d-block mx-auto" src="{{ asset('img/banner-logo.png') }}" style="height: 160px;" alt="">
    <h2 class="fs-montserrat mt-3"><b>KARAWANG</b></h2>
    <p class="fs-montserrat mt-5"><b>Enjoy a new experience playing roller skating, now available in Karawang!</b></p>
    <h4 class="fs-montserrat mt-3">Oct 05 - Nov 20, 2023</h4>
    <a class="btn btn-outline-light fs-montserrat rounded-pill py-2 px-5" style="margin-top: 90px"  href="#"><b>See You Next Event Nava Peoples!</b></a>
</div>
<a class="text-center d-block mx-auto text-white mt-4" style="font-size: 3em;" href="#content"><i class="bi bi-arrow-down-circle"></i></a>
<div id="content"></div>
<div class="container" style="height: 50vh;">
    <img class="d-block mx-auto" src="{{ asset('img/banner-logo.png') }}" style="height: 150px; margin-top:180px" alt="">
</div>
<div class="container text-white" style="height: 50vh; margin-top:80px">
    <h3 class="fs-montserrat text-center"><b>First in Karawang!</b></h3>
    <p class="fs-montserrat text-center p-2">Nava Exhibition is an exhibition of digital art, light illustrations, and a roller skating area. It is hoped that this will be the start for the advancement of entertainment in Karawang.</p>
</div>
<div class="container my-4">
    <h4 class="fs-montserrat text-center text-white"><i>Created & Produced by:</i></h4>
    <div class="container"></div>
    <div class="row p-2" style="margin-top:150px">
        <div class="col-6">
            <p class="fs-montserrat text-center text-white mt-4" style="font-size: 1.2rem;"><b>Great A Creative</b></p>
        </div>
        <div class="col-6">
            <img class="d-block mx-auto" src="{{ asset('img/banner-logo.png') }}" style="height: 4.5rem; alt="">
        </div>
    </div>
</div>

<div class="container fs-montserrat text-center text-white" style="height:50vh; margin-bottom:250px">
    <h3 style="margin-top:150px;"><b>Exhibition Address</b></h3>
    <h5 class="mt-5"><b>Gramedia World Karawang</b></h5>
    <h5><b>(3rd floor)</b></h5>
    <p>kav. V, Jl. Galuh Mas Raya, Sukaharja, Telukjambe Timur, Karawang, Jawa Barat 41361</p>
    <h5 class="mt-5"><b>Hour</b></h5>
    <p style="font-size: 1.4em">Monday - Sunday</p>
    <p style="font-size: 1.4em">10AM - 8PM</p>
    <h5 class="mt-5"><b>Price</b></h5>
    <p style="font-size: 1.4em">Weekday : Rp 105,000/ticket</p>
    <p style="font-size: 1.4em">Weekend : Rp 125,000/ticket</p>

</div>
@endsection