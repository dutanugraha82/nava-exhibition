@extends('admin.master')
@section('content')
<h5 class="text-center">Report OTS</h5>
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
<div class="table-responsive mt-5">
<table class="hover" id="otsReport">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Jumlah Tiket</th>
            <th>Total</th>
            <th>Via</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div>
@endsection
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#otsReport').DataTable({
               processing: true,
               serverSide: true,
               responsive:{
                    details:{
                            type:'column'
                            }
                },
                columnDefs:[{
                    className:'dtr-control',
                    orderable:false,
                    targets:0
                }],
               ajax: "{{ route('superadmin.otsReport') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total_harga', name: 'total_harga'},
                   {data: 'via', name: 'via'},
                   {data: 'admin', name: 'admin'},
               ]
           });
       });
</script>
@endpush