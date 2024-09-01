@extends('admin.master')
@section('content')
<h5 class="text-center">Kode Tiket Fisik</h5>
<div class="mb-2" style="display: flex; justify-content: space-between">
    <a class="btn btn-success mb-3" href="/admin/tiket-fisik/export"><i class="fas fa-file-excel"></i> Download Excel</a>
    <p><b>Tiket Tersedia : {{ $sisaTiket }}</b></p>
</div>
<div class="container-fluid">
    <div class="table-responsive mt-2">
        <table class="hover" id="kodeFisik" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#kodeFisik').DataTable({
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
               ajax: "{{ route('admin.tiket.fisik') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'no'},
                   {data: 'kode', name: 'kode'},
                   {data: 'status_tiket', name: 'status_tiket'},
                   {data: 'action', name: 'action'},
               ]
           });
       });
</script>
@endpush