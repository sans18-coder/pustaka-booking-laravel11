<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    @if(session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                </div>
                <div class="col-sm-12 col-md-6 dataTables_filter text-right">
                    <a href="" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#bukuBaruModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Buku Baru</span>
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
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>ISBN</th>
                            <th>Detail</th>
                            <th>Edit/Delet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1?>
                        @foreach ( $buku as $buku)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $buku->judul_buku }}</td>
                            <td>{{ $buku->kategori->kategori }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->isbn }}</td>
                            <td>
                                <form action="/detail-buku/{{ $buku->id }}">
                                    <button class="border-0 badge badge-info mr-2 p-2" href="">Detail</button>
                                </form>
                            </td>
                            <td class="text-center col-2">
                                <div class="d-flex justify-content-center">
                                        <a href="admin-ubahBuku/{{ $buku->id  }}" class="border-0 badge badge-info mr-2 p-2">
                                            <i class="fas fa-edit"> Ubah</i>
                                        </a>
                                    <form action="/hapus-buku/{{ $buku->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $buku->judul_buku }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="border-0 badge badge-danger ml-2 p-2">
                                                <i class="fas fa-trash"> Hapus</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah buku baru-->
    <div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tambah-buku" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="judul" name="judul" placeholder="Masukkan Judul Buku">
                        </div>
                        <div class="form-group">
                            <select name="id_kategori" class="form-control form-control-user">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Masukan Sinopsis :</label>
                            <textarea class="form-control form-control-user" id="sinopsis" name="sinopsis"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit">
                        </div>
                        <div class="form-group">
                            <select name="tahun_terbit" class="form-control form-control-user">
                                <option value="">Pilih Tahun</option>
                                <?php
                                for ($i = date('Y'); $i > 1000; $i--) { ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>