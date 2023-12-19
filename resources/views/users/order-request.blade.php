@extends('master')
@section('page-title')
    De Luna - order ticket
@endsection
@section('content')
<div class="container-fluid" style="margin-top: 6rem;">
    <h2 class="fs-montserrat mt-3 text-white"><b>Form pembelian ticket</b></h2>
    <div class="card p-4 fs-montserrat" style="border-radius:9px;">
        
        <form action="/tickets/{{ $data->kode_registrasi }}/payment/store" id="form" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
            <div class="col-md mb-4 mb-md-0">
                <img class="d-block mx-auto" style="width: 20rem; height:25rem;" src="{{ asset('img/qris.JPG') }}" alt="">
                <figcaption class="text-center">Scan QR untuk pembayaran</figcaption>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="email">Email Aktif</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="{{ $data->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="tiket">Jenis Tiket</label>
                    <input type="text" class="form-control" readonly value="{{ $data->ticket->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah">Jumlah Tiket</label>
                    <input type="number" class="form-control" name="jumlah_tiket" value="{{ $data->jumlah_tiket }}" id="amount" max="2" readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah">Jumlah yang harus dibayar</label>
                    <input type="text" class="form-control" name="jumlah_tiket" value="{{ $total_harga }}" id="amount" max="2" readonly>
                </div>
                <label for="">Bukti Pembayaran <span class="text-danger">*</span></label>
                <input type="file" name="invoice" class="form-control" id="image" onchange="imgPreview()" required>
                <div class="my-4">
                    <img class="img-preview d-block mx-auto" style="max-width: 300px" alt="">
                </div>
            </div>
           </div>
            <button type="submit" class="btn d-block mx-auto" style="margin-top: 30px; background-color:#6360e1; color:white; width:90%;">Bayar</button>
        </form>
    </div>
    <hr>
    
</div>
@endsection
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush