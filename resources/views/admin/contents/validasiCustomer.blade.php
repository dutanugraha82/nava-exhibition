@extends('admin.master')
@section('content')
<h5 class="text-center">Validasi Customer</h5>
<div class="mt-4">
    <p class="text-danger"><i>*Lakukan validasi customer disini, dengan memeriksa bukti pembayaran pada kolom file.</i></p>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="hover" id="customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis</th>
                        <th>Tiket</th>
                        <th>Total</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
       $(function () {
           var table = $('#customers').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('admin.validationCustomers') }}",
               columns: [
                {data: 'DT_RowIndex', name: 'no'},
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'jenis', name: 'jenis'},
                   {data: 'jumlah_tiket', name: 'jumlah_tiket'},
                   {data: 'total_harga', name: 'total_harga'},
                   {data: 'file', name: 'file'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
</script>
@endpush