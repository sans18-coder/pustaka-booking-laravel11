<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->nama }}</x-slot:user>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-6">
                @if(session('pesan'))
                    <div class="alert alert-info">
                        {{ session('pesan') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row d-flex justify-content-between m-auto">
            <div class="card mb-3 p-2 col-lg-5 col-md-12" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/'. $user->image) }}" class="card-img" alt="Profile Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->nama }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">{{ $user->alamat }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Jadi member sejak: <br>
                                    <b>{{ $user->created_at }}</b>
                                </small>
                            </p>
                        </div>
                        <div class="btn btn-info ml-3 my-3">
                            <a href="/ubah-profile" class="text-white">
                                <i class="fas fa-user-edit"></i> Ubah Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Booking -->
            <div class="table-responsive col-lg-7 col-md-12">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">History Booking</h6>
                    </div>
                    <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th>Nomor ISBN</th>
                            <th>Tanggal Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($booking as $index => $b)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td nowrap>{{ $b->buku->judul_buku }}</td>
                                <td nowrap>{{ $b->buku->pengarang }}</td>
                                <td nowrap>{{ substr($b->buku->tahun_terbit, 0, 4) }}</td>
                                <td nowrap>{{ $b->buku->isbn }}</td>
                                <td nowrap>{{ $b->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-user>
