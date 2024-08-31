<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user }}</x-slot:user>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if (session('pesan'))
            <div class="alert alert-info">
                {{ session('pesan') }}
            </div>
        @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
     
        <div style="padding: 25px;">
            <div class="x_panel">
                <div class="x_content">
                    <!-- Tampilkan semua produk -->
                    <div class="row">
                        @foreach ($buku as $item)
                            <div class="col-md-3 mb-3">
                                <div class="thumbnail">
                                    <img src="{{ asset('storage/' . $item->image) }}" style="max-width:100%; max-height: 100%; height: 200px; width: 180px">
                                    <div class="caption">
                                        <h5 style="min-height:30px;">{{ $item->judul_buku }}</h5>
                                        <h6>{{ $item->pengarang }}</h6>
                                        <h6>{{ $item->penerbit }}</h6>
                                        <h6>{{ substr($item->tahun_terbit, 0, 4) }}</h6>
                                        <p>
                                            @if ($item->stok < 1)
                                                <form action="/temp/{{ $item->id }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary" onclick="showLoginModal()" disabled>
                                                        <span class="fas fa-shopping-cart"></span> Booking&nbsp;&nbsp;0
                                                    </button>
                                                </form>
                                            @else
                                                <form action="/temp/{{ $item->id }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary" onclick="showLoginModal()">
                                                        <span class="fas fa-shopping-cart"></span> Booking
                                                    </button>
                                                </form>
                                            @endif
                                            <a class='btn btn-outline-warning' href="/detail-buku/{{ $item->id }}" onclick="showLoginModal()" ><span class="fas fa-search"></span> Detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Modal -->
    <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="daftarModalLabel">Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/daftar" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Tempat Tinggal">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password" >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Confirm Password">
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/login-user" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password" >
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-user>
