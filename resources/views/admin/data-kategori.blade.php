<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Buku</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#kategoriBaruModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Kategori Buku</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="col-2">Hapus</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="col-1">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="col-2">Hapus</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1?>
                        @foreach ($data->all() as $data)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td >{{ $data->kategori }}</td>
                                <td class="text-center">
                                    <form action="/hapus-kategori/{{ $data->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $data->kategori }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
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
    <div class="modal fade" id="kategoriBaruModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tambah-kategori" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori" class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>