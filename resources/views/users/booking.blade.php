@extends('master')
@section('page-title')
    Nava Exhibiton | Booking Ticket
@endsection
@section('content')
    <div class="container-fluid" style="margin-top: 6rem;">
        <div class="card  mb-5">
            <form action="/booking-store/{{ $date->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="fs-monserrat text-center p-3">Form Booking Ticket</h5>
                <hr>
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-danger">(Active email)*</span></label>
                                <input type="text" name="email" class="form-control" required placeholder="example@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="62xxxxx (without +)" required>
                            </div>
                        </div>
                        <div class="col-md-6">  
                            <div class="mb-3">
                                <label for="birthday">Gender <span class="text-danger">*</span></label>
                                <select name="sex" class="form-control" >
                                    <option value="">----- Choose -----</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size">Size Shoes <span class="text-danger">*</span></label>
                                <input type="text" name="size" class="form-control" placeholder="41 (example if more than 1 pair: 41, 42,...)"  required>
                            </div>
                            <div class="mb-3">
                                <label for="ticket">Amount of Ticket <span class="text-danger">(max 10 tickets/data)*</span></label>
                                <input type="number" name="ticket" class="form-control" id="amount" max="10" required>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center fs-monserrat my-4">Schedules at {{ $date->date }}</h5>
                    <input type="hidden" id="status" value="{{ $date->status }}">

                    <select name="time" class="form-control" id="time">
                        <option value="">Choose Time</option>
                        @foreach ($time as $item)
                        <option value="{{ $item->id }}">{{$item->time}} | slot : {{ $item->slot }}</option> 
                        @endforeach
                    </select>
                    <hr>
                    <div class="card-header my-4">
                        Persiapkan bukti pembayaran dalam pengisian form selanjutnya (No rekening terlampir dibawah ini).<br> <i>Prepare proof of payment in filling out the next form (The account number is attached below).</i>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="">The Account Number (Nava account name)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="norek" value="74125657" readonly>
                                <button type="button" class="btn btn-outline-dark" id="save">Copy</button>
                            </div>
                            <div class="d-flex mt-4">
                                <h5 class="fs-monserrat">Your Total : </h5>
                                <h5 id="total"></h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Proof of payment <span class="text-danger">*</span></label>
                            <input type="file" name="invoice" class="form-control" id="image" onchange="imgPreview()" required>
                            <div class="my-4">
                                <img class="img-preview d-block mx-auto" style="max-width: 300px"  alt="">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary d-block mx-auto mb-4" style="width: 80%">Submit</button>
                    <a href="/booking" class="btn btn-warning d-block mx-auto mb-4" style="width: 80%">Back</a>
            </form>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#date').select2();
        });
    </script>
    <script>
        function imgPreview()
       {
           const image = document.querySelector('#image');
           const imagePreview = document.querySelector('.img-preview');

           imagePreview.style.display = 'block';

           const oFReader = new FileReader();
           oFReader.readAsDataURL(image.files[0]);

           oFReader.onload = function(oFREvent){
               imagePreview.src = oFREvent.target.result;
           }
       }
   </script>
@endpush