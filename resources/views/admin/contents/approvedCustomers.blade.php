@extends('admin.master')
@section('content')
    <h4>Approved Customers</h4>
    <hr>
    <div class="col-12 table-responsive">
        <table class="hover" id="approvedCustomers">
            <thead>
                <tr>
                    <th>Reg.Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>
                    <th>Total Price</th>
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
                   {data: 'code', name: 'code'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'sex', name: 'sex'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'amount', name: 'amount'},
                   {data: 'total', name: 'total'},
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
                   {data: 'code', name: 'code'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'sex', name: 'sex'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'amount', name: 'amount'},
                   {data: 'total', name: 'total'},
               ]
           });
       });
</script>
@endpush
@endif