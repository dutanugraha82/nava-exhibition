@extends('master')
@section('page-title')
    Nava Exhibiton | Choose Date
@endsection
@push('css')
    <style>
        .banner{
        height: 95vh;
        background-image: url("/img/book-date.jfif");
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
@section('content')
<div class="banner" style="margin-top: 5rem;">
</div>
<div class="banner-content" style="position: absolute; top: 58%; left: 50%; transform: translate(-50%, -50%);">
    <h2 class="fs-montserrat mt-3"><b>Booking Date</b></h2>
    <hr>
    <form action="/booking" method="POST" style="width: 300px">
        @csrf
        <select name="date" class="form-control" id="date" required>
            <option value="">--- Choose Date ---</option>
            @foreach ($date as $item)
            <option value="{{ $item->id }}">{{$item->date}}</option> 
            @endforeach
        </select> <br>
        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Booking!</button>
    </form>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#date').select2();
        });
    </script>
@endpush