<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="/laporan-peminjaman" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-search"></i>
                        </span>
                        <span class="text">Lihat Laporan</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Pinjam</th>
                            <th>Nama</th>
                            <th>Nomor Booking</th>
                            <th>Detail</th>
                            <th nowrap>Tanggal Pinjam</th>
                            <th nowrap>Batas Pengembalian</th>
                            <th>Denda/Buku</th>
                            <th>Konfirmasi Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td nowrap>{{ $p->booking->user->nama }}</td>
                                <td>{{ $p->id_booking }}</td>
                                <td class="text-center">
                                    <a class="border-0 badge badge-info mr-2 p-2" href="/detail-booking-user/{{ $p->id }}">Detail</a>
                                </td>
                                <td class="text-center">{{ $p->tgl_pinjam }}</td>
                                <td class="text-center">{{ $p->tgl_kembali }}</td>
                                <td> {{ $p->detail->sum('denda') }}</td>
                                <td class="text-center">
                                    <form action="/{{ $p->id }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 badge badge-success p-2">
                                            Confirm
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>