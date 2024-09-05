@extends('master')
@section('page-title')
    Psychoforia - order ticket
@endsection
@section('content')
<div class="container" style="margin-top: 6rem;">
    <h2 class="fs-montserrat mt-3 text-center text-white"><b>Pembayaran Tiket</b></h2>
    <div class="card p-4 fs-montserrat" style="border-radius:9px;">
        
        <form action="/tickets/{{ $data->kode_registrasi }}/payment/store" id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Untuk pembayaran bisa dilakukan dengan cara transfer ke no rekening di bawah ini, lalu upload file bukti pembayaran di kolom yang sudah disediakan.</p>
            <h5 style="font-family: Arial, Helvetica, sans-serif">1092917015 (A.N DEWI ANGGRAENI)</h5>
            <button style="background-color: #6360e1; color:white" class="btn shadow-lg" onclick="salinNomor()">Salin Nomor Rekening</button>
            <hr>
                <div class="mb-3">
                    <label for="jumlah">Jumlah yang harus dibayar</label>
                    <input type="text" class="form-control" name="jumlah_tiket" value="{{ $total_harga }}" id="amount" max="2" readonly>
                </div>
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
                <label for="">Bukti Pembayaran <span class="text-danger">*</span></label>
                <input type="file" name="invoice" class="form-control" id="image" onchange="imgPreview()" required>
                <div class="my-4">
                    <img class="img-preview d-block mx-auto" style="max-width: 300px" alt="">
                </div>
            <button type="submit" class="btn d-block mx-auto" style="margin-top: 30px; background-color:#6360e1; color:white; width:90%;">Bayar</button>
        </form>
    </div>
    <hr>
    
</div>
@endsection
@push('js')
<script>
    function salinNomor() {
        // Membuat elemen teks sementara untuk menyalin nomor
        var nomor = "1092917015";
        var tempInput = document.createElement("input");
        tempInput.value = nomor;
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // Untuk perangkat mobile
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        
        // Menampilkan notifikasi
        alert("Nomor Rekening" + nomor + " berhasil disalin!");
    }
</script>
<script src="{{ asset('js/app.js') }}"></script>
@endpush