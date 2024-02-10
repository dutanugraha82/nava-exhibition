@extends('master')
@section('content')
    <div class="container-fluid" style="height: 70vh; margin-top: 8rem;">
        <div class="card p-4" style="background-color:#f5be4e;">
            <form action="/check-ticket" method="POST">
                @csrf
                <h5 class="text-center fs-montserrat">Masukan Kode Tiket Kamu</h5>
               <div class="my-5">
                <input type="text" class="form-control" name="kode" placeholder="Masukan Kode tiket kamu" required>
               </div>
               <button type="submit" class="btn btn-primary d-block mx-auto" style="width: 100%">Check Ticket</button><br>
               <a href="/" class="btn btn-danger d-block mx-auto" style="width: 100%">Kembali</a>
            </form>
        </div>
    </div>
@endsection