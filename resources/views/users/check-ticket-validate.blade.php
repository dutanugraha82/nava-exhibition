@extends('master')
@section('content')
    <div class="container-fluid" style="height: 60vh; margin-top: 8rem;">
        <div class="card p-4" style="background-color:#f5be4e;">
            <h4 class="fs-montserrat text-center">Tiket Kamu Terdaftar!</h4>
            <p class="text-center fs-montserrat">Kode Tiket :</p>
            <h5 class="text-center"><b>{{ $kode }}</b></h5>
            @if ($status == '0')
            <span style="text-align: center">Status : Belum Digunakan</span>
            @else
            <span style="text-align: center">Status : Sudah Digunakan</span>
            @endif
            <a href="/" class="btn btn-danger d-block mx-auto" style="width: 100%; margin-top: 5rem">Kembali</a>
        </div>
    </div>
@endsection