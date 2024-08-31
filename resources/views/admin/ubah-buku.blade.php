<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <div class="row">
        <div class="col-lg-6">
            <form action="/update-buku/{{ $buku->id }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="{{ $buku->judul_buku }}">
                </div>
                <div class="form-group">
                    <select name="id_kategori" class="form-control form-control-user">
                        <option value="{{ $buku->id_kategori }}" selected="selected">{{ $buku->kategori->kategori }}</option>
                        @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value="{{ $buku->pengarang }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value="{{ $buku->penerbit }}">
                </div>
                <div class="form-group">
                    <select name="tahun_terbit" class="form-control form-control-user">
                        <option value="{{ $buku->tahun_terbit }}">{{ $buku->tahun_terbit }}</option>
                            <?php
                            for ($i = date('Y'); $i > 1000; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sinopsis">Masukan Sinopsis :</label>
                    <textarea class="form-control form-control-user" id="sinopsis" name="sinopsis">{{ $buku->sinopsis }}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="{{ $buku->isbn }}">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="{{ $buku->stok }}">
                </div>
                <div class="form-group">
                    <?php
                    if (isset($buku->image)) { ?>
                        <input type="hidden" name="old_image" id="old_image" value="{{ $buku->image }}">
                        <picture>
                            <source srcset="" type="image/svg+xml">
                            <img src="{{ asset('storage/' . $buku->image) }}" class="rounded mx-auto mb-3 d-blok" alt="...">
                        </picture>
                        <?php } ?>
                    <input type="file" class="form-control form-control-user" id="image" name="image">
                </div>
                <div class="form-group">
                    <a href="/data-buku" class="form-control form-control-user btn btn-dark col-lg-3 mt-3">Kembali</a>
                    <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>