@extends('layouts.app')
@section('title', 'Data Sirkulasi Peminjaman')
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Sirkulasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Peminjaman</th>
                                    <th>Judul Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_peminjaman }}</td>
                                        <td>{{ $data->buku->judul }}</td>
                                        <td>{{ $data->anggota->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->tanggal_pinjam)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->tanggal_kembali)) }}</td>
                                        <td>
                                            @php
                                                $sekarang = date('Y-m-d');
                                                $selisih = strtotime($sekarang) - strtotime($data->tanggal_kembali);
                                                $selisih = $selisih / 86400;
                                                $denda = $selisih * 3000;
                                                if ($selisih >= 1) {
                                                    echo '<p class="badge badge-md badge-danger">Denda Rp. ' . number_format($denda, '0', ',', '.') . '</p>';
                                                } else {
                                                    echo '<p class="badge badge-md badge-info"> Dalam masa peminjaman</p>';
                                                }
                                                
                                            @endphp
                                        </td>
                                        <td>
                                            <form action="{{ route('peminjaman.perpanjang', $data->id) }}"
                                                class="d-inline" method="post">
                                                @csrf
                                                @method('put')
                                                <button class="btn btn-sm btn-warning mb-2"
                                                    onClick="return confirm('Perpanjang Peminjaman ?');"><i
                                                        class="fas fa-edit"></i>
                                                    Perpanjang</button>
                                            </form>

                                            <form action="{{ route('peminjaman.pengembalian', $data->id) }}"
                                                class="d-inline" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" onClick="return confirm('Kembalikan Buku ?');"
                                                    class="btn btn-sm btn-success mb-2"><i class="fas fa-check"></i>
                                                    Di Kambalikan</a>
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
                    <form action="{{ route('peminjaman.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode_peminjaman">Kode Peminjaman</label>
                            <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman"
                                placeholder="kode peminjaman" value={{ uniqid() }} readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_buku">Judul Buku</label>
                            <select class="form-control select_buku" id="id_buku" name="id_buku">
                                <option>Judul Buku</option>
                                @foreach ($buku as $bk)
                                    <option value="{{ $bk->id }}">{{ $bk->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_anggota">Peminjam</label>
                            <select class="form-control select_buku" id="id_anggota" name="id_anggota">
                                <option>Peminjam</option>
                                @foreach ($anggota as $ag)
                                    <option value="{{ $ag->id }}">{{ $ag->nis }} - {{ $ag->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                                placeholder="tanggal pinjam" requried>
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

@endsection
@section('js')
    <script>
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    </script>
@endsection
