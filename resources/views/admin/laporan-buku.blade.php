<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="/cetak-laporan-buku" class="btn btn-danger btn-icon-split btn-sm">
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
                            <th>Cover</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>ISBN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $index => $b)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>
                                <img src="{{ asset('storage/' . $b->image) }}" style="max-width:100%; max-height: 100%; height: 80px; width: 70px">
                            </td>
                            <td>{{ $b->judul_buku }}</td>
                            <td>{{ $b->kategori->kategori }}</td>
                            <td>{{ $b->pengarang }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahun_terbit }}</td>
                            <td>{{ $b->isbn }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>