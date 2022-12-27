@extends('layouts.app')
@section('title', 'Log Data Peminjaman')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Seluh Peminjaman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->buku->judul }}</td>
                                        <td>{{ $data->anggota->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->tanggal_pinjam)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
