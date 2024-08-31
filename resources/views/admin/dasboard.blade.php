<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Stok Buku Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_buku }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Buku Dipinjam
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_buku_dipinjam }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Buku Dibooking</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_buku_dibooking }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar booking</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Booking</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Tanggal Booking</th>
                            <th>Batas Pengambilan</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nomor Booking</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Tanggal Booking</th>
                            <th>Batas Pengambilan</th>
                            <th>Confirm</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($booking as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->user->nama }}</td>
                                <td class="text-center">
                                    <a class="border-0 badge badge-info mr-2 p-2" href="/detail-booking-user/{{ $b->id }}">Detail</a>
                                </td>
                                <td class="text-center">{{ $b->tgl_booking }}</td>
                                <td class="text-center">{{ $b->batas_ambil }}</td>
                                <td class="text-center">
                                    <form action="/confirm-booking-user/{{ $b->id }}" method="POST" style="display: inline;">
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