@extends('admin.master')
@section('page-title')
ticket-list
@endsection
@section('content')
    <div class="card p-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <span>+</span>ADD Ticket
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/superadmin/tickets/create" method="POST" enctype="multipart/form-data">
                    @csrf
                
                <div class="modal-body">
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control mb-3" name="nama" required placeholder="Nama Ticket">
                </div>
                <div class="mb-3">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>
                <div class="mb-3">
                    <label for="slot">Slot</label>
                    <input type="number" class="form-control" name="slot" required>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="avilable">Available</label>
                    <input type="date" class="form-control" name="available" required>
                </div>
                <div class="mb-3">
                    <label for="expired">Expired</label>
                    <input type="date" class="form-control" name="expired" required>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Ticket</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Ticket</th>
                <th scope="col">Slot</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Expired</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->slot }}</td>
                  <td>{{ $item->harga }}</td>
                  @if ($item->status == 0)
                      <td>Non Active</td>
                  @else
                      <td>Active</td>
                  @endif
                  <td>{{ $item->expired }}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                        <a href="/superadmin/tickets/edit/{{ $item->id }}" class="text-warning"><i class="fa fa-pencil-alt mt-2"></i></a>
                        <a href="/superadmin/tickets/customers/{{ $item->id }}" class="text-primary"><i class="fa fa-users mt-2"></i></a>
                        <form action="/superadmin/tickets/{{ $item->id }}/unactivate" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn text-warning" type="submit" onclick="return confirm('Yakin ingin non aktifkan tiket?')"><i class="fa fa-times"></i></button>
                        </form>

                        <form action="/superadmin/tickets/{{ $item->id }}/activate" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn text-success" type="submit" onclick="return confirm('Yakin ingin aktifkan tiket ini?')"><i class="fa fa-check-square"></i></button>
                        </form>

                        <form action="/superadmin/tickets/{{ $item->id }}/delete" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn text-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash-alt"></i></button>
                        </form>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
