<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#tambahAdmin">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Account</span>
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
                            <th>Hapus</th>
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
                            <th>Hapus</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($admin as $index => $a)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>
                                    <img src="{{ asset('storage/' . $a->image) }}" style="max-width:100%; max-height: 100%; height: 40px; width: 36px">
                                </td>
                                <td nowrap>{{ $a->nama }}</td>
                                <td nowrap>{{ $a->email }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td nowrap>{{ $a->created_at }}</td>
                                <td>
                                    <form action="/hapus-admin/{{ $a->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $a->nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="border-0 badge badge-danger ml-2 p-2">
                                                <i class="fas fa-trash"> Hapus</i>
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
    <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="tambahProduk" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProduk">Buat Akun Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tambah-admin" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="foto_admin" name="foto_admin">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama Admin">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamat_admin" name="alamat_admin" placeholder="Masukkan Alamat Admin">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email_admin" name="email_admin" placeholder="Masukkan Email Admin">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="Masukkan Password Admin">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password_admin_confirmation" name="password_admin_confirmation" placeholder="Masukkan Confirm Password Admin">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>