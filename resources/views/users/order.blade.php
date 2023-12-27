@extends('master')
@section('page-title')
    De Luna - order ticket
@endsection
@section('content')
<div class="container-fluid" style="margin-top: 6rem;">
    <h2 class="fs-montserrat mt-3 text-white"><b>Form pembelian ticket</b></h2>
    <div class="card p-4 fs-montserrat" style="background-color:#f5be4e; border-radius:9px;">
        
        <form action="/tickets/{{ $ticket->id }}/order" id="form" method="POST">
            @csrf
           <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="email">Email Aktif <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="isi dengan email aktif" required>
                </div>
                <div class="mb-3">
                    <label for="email">Retype Email <span class="text-danger">*</span></label>
                    <input type="email" name="validateEmail" id="retypeEmail" class="form-control" required placeholder="ketik ulang email aktif">
                    <span id="emailError" style="color: red;"></span>
                </div>
                <div class="mb-3">
                    <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" placeholder="isi nama lengkap" id="txtNumeric" required>
                </div>
                <div class="mb-3">
                    <label for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="sex" class="form-control" id="">
                        <option value="">--Pilih--</option>
                        <option value="male">Laki - Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                
                
                
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="tiket">Jenis Tiket <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" readonly value="{{ $ticket->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah">Jumlah Tiket <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="jumlah_tiket" id="amount" max="2" required>
                </div>
                <div class="mb-3">
                    <label for="nohp">No WhatsApp <span class="text-danger">*tanpa "+"</span></label>
                    <input type="" class="form-control" name="nohp" placeholder="isi tanpa tanda '+'" required>
                </div>
            </div>
           </div>
            <button type="submit" id="tombol" class="btn d-block mx-auto" style="margin-top: 30px; background-color:#6360e1; color:white; width:90%;">Selanjutnya</button>
        </form>
    </div>
    <br>
    
</div>
@endsection
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    //NYARI APAAN? GAK ADA APA-APA DISINI, COMOT AJA JSNYA. MAINNYA KURANG JAUH.
    document.getElementById("form").addEventListener("input", function(event) {
        var email = document.getElementById("email").value;
        var retypeEmail = document.getElementById("retypeEmail").value;
        var emailError = document.getElementById("emailError");

        if (email !== retypeEmail) {
            emailError.textContent = "Email tidak sama.";
            event.preventDefault();
        } else {
            emailError.textContent = "";
        }
    });
    $(function() {

$('#txtNumeric').keydown(function (e) {

  if (e.shiftKey || e.ctrlKey || e.altKey) {
  
    e.preventDefault();
    
  } else {
  
    var key = e.keyCode;
    
    if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
    
      e.preventDefault();
      
    }

  }
  
});

});

$(document).ready(function () {
    $("#form").submit(function () {
        $("#tombol").attr("disabled", true);
        return true;
    });
});
</script>
@endpush