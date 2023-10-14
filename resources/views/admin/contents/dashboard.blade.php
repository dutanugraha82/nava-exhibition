@extends('admin.master')
@section('content')
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Earning</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $earning }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Ticket Sold</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ticket }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Approved Customers
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedCustomers }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pending Customers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingCustomers }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<h5 class="text-center">Unvalidated Customers</h5>
<div class="mt-4">
    <div class="row">
        <div class="col-12 table-responsive">
            
            <table class="hover" id="customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Amount</th>
                        <th>Invoice</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@if (auth()->user()->role == 'superadmin')
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#customers').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('superadmin.dashboard') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'amount', name: 'amount'},
                   {data: 'file', name: 'file'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
</script>
@endpush
@elseif(auth()->user()->role == 'admin')
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#customers').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('admin.dashboard') }}",
               columns: [
                {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'amount', name: 'amount'},
                   {data: 'file', name: 'file'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
</script>
@endpush
@endif