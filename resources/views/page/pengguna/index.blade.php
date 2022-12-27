@extends('layouts.app')
@section('title', 'Data Pengguna')
@section('content')
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="col-12">
            @if (auth()->user()->role == 'admin')
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambah">Tambah
                    Tambah Data Pengguna</button>
            @endif
        </div>
        <div class="col-12 mt-3">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @if (auth()->user()->role == 'admin')
                                                <a href="#" class="btn btn-sm btn-warning mb-2" data-toggle="modal"
                                                    data-target="#edit" data-item="{{ json_encode($user) }}"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</a>

                                                <form action="{{ route('pengguna.drop', $user->id) }}"
                                                    class="d-inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onClick="return confirm('Hapus Pengguna ?');"
                                                        class="btn btn-sm btn-danger mb-2 mr-1"><i
                                                            class="fas fa-trash"></i>
                                                        Hapus</a>
                                                </form>

                                                <form action="{{ route('pengguna.toAdmin', $user->id) }}"
                                                    class="d-inline" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" onClick="return confirm('Jadikan Admin ?');"
                                                        class="btn btn-sm btn-success mb-2"><i class="fas fa-check"></i>
                                                        Jadikan Admin</a>
                                                </form>
                                            @elseif(auth()->user()->id === $user->id)
                                                <a href="#" class="btn btn-sm btn-warning mb-2" data-toggle="modal"
                                                    data-target="#edit" data-item="{{ json_encode($user) }}"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Buku Modal-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengguna.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" requried>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="password" requried>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Konfirmasi</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="konfirmasi password" requried>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Tambah</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Buku Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengguna.update') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="edit_name">Nama</label>
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="nama">
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" placeholder="email"
                                requried>
                        </div>
                        <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input type="password" class="form-control" id="edit_password" name="password"
                                placeholder="password" requried>
                        </div>
                        <div class="form-group">
                            <label for="edit_password_confirmation">Password</label>
                            <input type="password" class="form-control" id="edit_password_confirmation"
                                name="password_confirmation" placeholder="konfirmasi password" requried>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Update</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
      $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
        
        $("#edit").on('show.bs.modal', (e) => {
            let button = $(e.relatedTarget);
            let form = button.data('item');

            id.value = form.id;
            edit_name.value = form.name;
            edit_email.value = form.email;
        });
    </script>
@endsection
