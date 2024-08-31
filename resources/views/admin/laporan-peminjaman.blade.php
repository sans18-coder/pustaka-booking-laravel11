<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="/cetak-laporan-peminjaman" class="btn btn-danger btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                        </span>
                        <span class="text">Convert To PDF</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pinjam</th>
                            <th>Nama</th>
                            <th>Nomor Booking</th>
                            <th nowrap>Tanggal Pinjam</th>
                            <th nowrap>Batas Pengembalian</th>
                            <th nowrap>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $peminjaman as $index => $p)    
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->id }}</td>
                                <td nowrap>{{ $p->booking->user->nama }}</td>
                                <td>{{ $p->id_booking }}</td>
                                <td>{{ $p->tgl_pinjam }}</td>
                                <td>{{ $p->tgl_kembali }}</td>
                                <td>{{ $p->tgl_Pengembalian }}</td>
                                <td>{{ $p->status }}</td>
                                <td>{{ $p->detail->sum('denda') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>