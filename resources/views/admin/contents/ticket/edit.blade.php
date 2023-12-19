@extends('admin.master')
@section('page-title')
    edit-ticket-{{ $data->nama }}
@endsection
@section('content')
    <div class="card p-3">
        <h5>Form ubah data ticket</h5>
        <hr>
        <form action="/superadmin/tickets/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control mb-3" name="nama" required value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="foto">Foto</label><br>
            <img class="col-4 rounded" src="{{ asset('storage'.'/'.$data->foto) }}" alt="banner">
            <input type="hidden" name="foto_lama" value="{{ $data->foto }}">
        </div>
        <div class="mb-3">
            <label for="">Foto Baru</label>
            <input type="file" class="form-control" name="foto_baru">
        </div>
        <div class="mb-3">
            <label for="slot">Slot</label>
            <input type="number" class="form-control" name="slot" value="{{ $data->slot }}" required>
        </div>
        <div class="mb-3">
            <label for="avilable">Available</label>
            <input type="date" class="form-control" name="available" value="{{ $data->available }}" required>
        </div>
        <div class="mb-3">
            <label for="expired">Expired</label>
            <input type="date" class="form-control" name="expired" value="{{ $data->expired }}" required>
        </div>
        <div class="ml-auto">
            <a href="/superadmin/tickets" class="btn btn-warning">Kembali</a>
            <button type="submit" onclick="return confirm('Yakin ingin merubah data?')" class="btn btn-primary">Update Data</button>
        </div>
            
        </form>
    </div>
@endsection