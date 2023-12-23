@extends('admin.master')
@section('content')
    <h4>Customers total : {{ $total }}</h4>
    <small>{{ $ticket->nama }}</small>
    <hr>
    <div class="col-12 table-responsive">
        <table class="hover" id="rejectedCustomers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>File</th>
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
           var table = $('#rejectedCustomers').DataTable({
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
               ajax: "{{ route('superadmin.rejectedCustomers') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total_harga', name: 'total_harga'},
                   {data: 'file', name: 'file'},
               ]
           });
       });
</script>
@endpush
@elseif(auth()->user()->role == 'admin')
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#rejectedCustomers').DataTable({
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
               ajax: "{{ route('admin.rejectedCustomers') }}",
               columns: [
                {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total_harga', name: 'total_harga'},
                   {data: 'file', name: 'file'},
               ]
           });
       });
</script>
@endpush
@endif