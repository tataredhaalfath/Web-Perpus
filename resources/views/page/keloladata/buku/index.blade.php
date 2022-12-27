@extends('layouts.app')
@section('title', 'Data Buku')
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Buku</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_buku }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->pengarang }}</td>
                                        <td>{{ $data->penerbit }}</td>
                                        <td>{{ $data->tahun_terbit }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning mb-2" data-toggle="modal"
                                                data-target="#edit" data-item="{{ json_encode($data) }}"><i
                                                    class="fas fa-edit"></i>
                                                Edit</a>

                                            <form action="{{ route('buku.drop', $data->id) }}" class="d-inline"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onClick="return confirm('Hapus Buku ?');"
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

    <!-- Tambah Buku Modal-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buku.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode_buku">Kode Buku</label>
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="kode buku" value={{ uniqid() }} readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul buku"
                                requried>
                        </div>
                        <div class="form-group">
                          <label for="pengarang">Pengarang</label>
                          <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="pengarang buku"
                              requried>
                      </div>
                      <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="penerbit buku"
                            requried>
                    </div>
                      <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="tahun terbit"
                            requried>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buku.update') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="edit_kode_buku">Kode Buku</label>
                            <input type="text" class="form-control" id="edit_kode_buku" name="kode_buku" placeholder="kode buku"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="edit_judul">Judul</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" placeholder="judul buku"
                                requried>
                        </div>
                        <div class="form-group">
                          <label for="edit_pengarang">Pengarang</label>
                          <input type="text" class="form-control" id="edit_pengarang" name="pengarang" placeholder="pengarang buku"
                              requried>
                      </div>
                      <div class="form-group">
                        <label for="edit_penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="edit_penerbit" name="penerbit" placeholder="judul buku"
                            requried>
                    </div>
                    <div class="form-group">
                      <label for="edit_tahun_terbit">Tahun Terbit</label>
                      <input type="number" class="form-control" id="edit_tahun_terbit" name="tahun_terbit" placeholder="tahun terbit"
                          requried>
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
        $("#edit").on('show.bs.modal', (e) => {
            let button = $(e.relatedTarget);
            let form = button.data('item');

            console.log(form);
            id.value = form.id;
            edit_kode_buku.value = form.kode_buku;
            edit_judul.value = form.judul;
            edit_pengarang.value = form.pengarang;
            edit_penerbit.value = form.penerbit;
            edit_tahun_terbit.value = form.tahun_terbit;
        });
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

    </script>
@endsection
