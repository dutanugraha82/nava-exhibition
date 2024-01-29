@extends('admin.master')
@section('content')
<div class="card p-2">
    <div class="row">
        <div class="col-md-4">
            <p>Jumlah Tiket Terjual</p>
            <p>{{ $tiket }}</p>
        </div>
        <div class="col-md-4">
            <p>Pembayaran QRIS</p>
            <p>{{ $qris }}</p>
        </div>
        <div class="col-md-4">
            <p>Pembayaran Cash : </p>
            <p>{{ $cash }}</p>
        </div>
    </div>
</div>
    <div class="container">
        <h5 class="mt-3">Form Pembelian On The Spot</h5>
        <hr>
        <form action="/admin/ots/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="sex">Jenis Kelamin (Pembeli) <span class="text-danger">*</span></label>
                        <select name="sex" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="male">Laki-Laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tiket">Jumlah Tiket <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_tiket" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="via">Metode Pembayaran</label>
                        <select name="via" class="form-control" required>
                            <option value="">Pilih Metode</option>
                            <option value="qris">QRIS</option>
                            <option value="tunai">Cash</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto mt-4" style="width:60vw;">Submit Tiket</button>
        </form>
    </div>
@endsection