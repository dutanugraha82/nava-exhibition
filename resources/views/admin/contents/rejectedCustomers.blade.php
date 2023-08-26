@extends('admin.master')
@section('content')
    <h4>Rejected Customers</h4>
    <hr>
    <div class="col-12 table-responsive">
        <table class="hover" id="rejectedCustomers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>
                    <th>Total Price</th>
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
               ajax: "{{ route('superadmin.rejectedCustomers') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'sex', name: 'sex'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'amount', name: 'amount'},
                   {data: 'total', name: 'total'},
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
               ajax: "{{ route('admin.rejectedCustomers') }}",
               columns: [
                    {data: 'DT_RowIndex', name: 'no'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'sex', name: 'sex'},
                    {data: 'date', name: 'date'},
                    {data: 'time', name: 'time'},
                    {data: 'amount', name: 'amount'},
                    {data: 'total', name: 'total'},
                    {data: 'file', name: 'file'},
               ]
           });
       });
</script>
@endpush
@endif