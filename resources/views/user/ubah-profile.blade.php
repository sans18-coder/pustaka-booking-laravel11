<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->nama }}</x-slot:user>
    <!-- Begin Page Content -->
<div class="container mt-5">
    @if (session('pesan'))
        <div class="alert alert-info">
            {{ session('pesan') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-9">
            <form action="/update-profile" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
                        @error('alamt')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{ asset('storage/' . $user->image) }}" class="img-thumbnail" alt="Profile Image">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="hidden" name="old_image" id="old_image" value="{{ $user->image }}">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Pilih File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a class="btn btn-dark" href='/user-profile'>Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</x-layout-user>