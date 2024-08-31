<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="/cetak-laporan-anggota" class="btn btn-danger btn-icon-split btn-sm">
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
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Alamat</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Alamat</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ( $anggota as $index => $a)    
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>
                                    <img src="{{ asset('storage/' . $a->image) }}" style="max-width:100%; max-height: 100%; height: 40px; width: 36px">
                                </td>
                                <td nowrap>{{ $a->nama }}</td>
                                <td nowrap>{{ $a->email }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td nowrap>{{ $a->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>