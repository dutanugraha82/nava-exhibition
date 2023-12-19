@extends('admin.master')
@section('content')
    <h4>Approved Customers</h4>
    <hr>
    <div class="col-12 table-responsive">
        <table class="hover" id="approvedCustomers">
            <thead>
                <tr>
                    <th>kode tiket</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis</th>
                    <th>Tiket</th>
                    <th>Total</th>
                    <th>Transaksi</th>
                    <th>Divalidasi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection
@if (auth()->user()->role == 'superadmin')
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#approvedCustomers').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('superadmin.approvedCustomers') }}",
               columns: [
                   {data: 'kode_tiket', name: 'kode_tiket'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'jenis_tiket', name: 'jenis_tiket'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total', name: 'total'},
                   {data: 'purchase_date', name: 'purchase_date'},
                   {data: 'admin', name: 'admin'},
               ]
           });
       });
</script>
@endpush
@elseif(auth()->user()->role == 'admin')
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#approvedCustomers').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('admin.approvedCustomers') }}",
               columns: [
                    {data: 'kode_tiket', name: 'kode_tiket'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'jenis_tiket', name: 'jenis_tiket'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total', name: 'total'},
                   {data: 'purchase_date', name: 'purchase_date'},
                   {data: 'admin', name: 'admin'},
               ]
           });
       });
</script>
@endpush
@endif