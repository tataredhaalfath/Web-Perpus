@extends('layouts.app')
@section('title', 'Data Anggota')
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
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambah">Tambah
                Data</button>
        </div>
        <div class="col-12 mt-3">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nis }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            @if ($data->jenis_kelamin == 'LK')
                                                Laki Laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning mb-2" data-toggle="modal"
                                                data-target="#edit" data-item="{{ json_encode($data) }}"><i
                                                    class="fas fa-edit"></i>
                                                Edit</a>

                                            <form action="{{ route('anggota.drop', $data->id) }}" class="d-inline"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onClick="return confirm('Hapus Data Anggta ?');"
                                                    class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash"></i>
                                                    Hapus</a>
                                            </form>
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

    <!-- Tambah Anggota Modal-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('anggota.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="nis siswa" requried>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama siswa"
                                requried>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option>Jenis Kelamin</option>
                                <option value="LK">Laki Laki</option>
                                <option value="PR">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" requried> </textarea>
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

    <!-- Edit Anggota Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('anggota.update') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="edit_nis">NIS</label>
                            <input type="text" class="form-control" id="edit_nis" name="nis" placeholder="nis siswa"
                                requried>
                        </div>
                        <div class="form-group">
                            <label for="edit_nama">Nama</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" placeholder="nama siswa"
                                requried>
                        </div>
                        <div class="form-group">
                            <label for="edit_jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="edit_jenis_kelamin" name="jenis_kelamin">
                                <option>Jenis Kelamin</option>
                                <option value="LK">Laki Laki</option>
                                <option value="PR">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="edit_alamat" name="alamat" placeholder="alamat" requried> </textarea>
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
            edit_nis.value = form.nis;
            edit_nama.value = form.nama;
            edit_jenis_kelamin.value = form.jenis_kelamin;
            edit_alamat.value = form.alamat;
        });
    </script>
@endsection
