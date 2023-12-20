@extends('admin.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/ticket.css') }}">
@endpush

@section('content')
    <h4>Detail Ticket Customer</h4>
    <hr>
    <div class="frame">
		<div class="ticket">
		  <div class="desc">
			<div class="title">
			  DELUNA MUSIC FESTIVAL
	
			  <div class="{{ $details['status_badge'] }}">
				<div class="badge-dotted"></div>
				<strong>{{ $details['status'] }}</strong>
			  </div>
			</div>
	
			<div class="detail">
			  <div class="detail-info">
				{{ $details["name"] }} <br/>
				{{ $details["email"] }} <br/>
				{{ $details["nohp"] }}
			  </div>
			  <div class="detail-ticket">
				<p>{{ $details["presale"] }}</p>
				Total tiket: {{ $details["jumlah_tiket"] }} <br/>
				Harga satuan tiket: Rp. {{ $details["harga_tiket"] }} <br/> 
				Total Harga tiket: Rp. {{ $details["total_harga"] }} <br/>
			  </div>

			@if($details['kode_registrasi'] == '0')
			<center>
				<form action="{{ route('admin.statusTicketUpdate', $details['kode_registrasi']) }}" method="POST">
					@method("PUT")
					@CSRF
					<button class="btn btn-primary mt-1" type="submit">Customer Masuk</button>
				</form>
			</center>
			@endif

			</div>
	
		  </div>
		  <div class="dotted">
			<div class="left"></div>
			<div class="right"></div>
		  </div>
		  <div class="qr">
			<div class="orderid">
			  <center>
				{{ $details["qr"] }}
			  </center>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('js')
@endpush