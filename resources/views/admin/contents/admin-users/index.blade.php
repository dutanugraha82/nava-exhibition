@extends('admin.master')
@section('page-title')
    - Admin List
@endsection
@section('content')
    <div class="card p-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <span>+</span>ADD ADMIN ACCOUNT
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Register New Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/superadmin/admin-users/create" method="POST">
                    @csrf
                
                <div class="modal-body">
                <input type="text" class="form-control mb-3" name="name" required placeholder="Full Name">
                <input type="email" class="form-control" name="email" required placeholder="Email">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Account</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admin as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>@mdo</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
