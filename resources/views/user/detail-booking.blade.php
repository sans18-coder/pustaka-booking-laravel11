<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user }}</x-slot:user>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Nomor ISBN</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($temp as $index => $t)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $t->buku->image) }}" class="rounded" alt="No Picture" width="20%">
                            </td>
                            <td nowrap>{{ $t->buku->pengarang }}</td>
                            <td nowrap>{{ $t->buku->penerbit }}</td>
                            <td nowrap>{{ substr($t->buku->tahun_terbit, 0, 4) }}</td>
                            <td nowrap>{{ $t->buku->isbn }}</td>
                            <td nowrap>
                                <form action="{{ url('/hapus-temp/' . $t->id) }}" method="POST" onsubmit="return confirm('Yakin tidak jadi booking {{ $t->buku->judul_buku }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <span class="fas fw fa-trash"></span>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        @if ($booking)
                            <tr>
                                <td colspan="7" class="bg-success text-white">Silahkan Ambil Buku paling lambat tanggal {{ $booking->batas_ambil }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        @endif
                    @endforelse
                </tbody>
            </table>
        </div>
    
        <div class="mt-3 d-flex">
            <a class="btn btn-sm btn-outline-primary" href="/" style="margin-right: 10px;">
                <span class="fas fw fa-play"></span> Lanjutkan Booking Buku
            </a>
            <form action="/booking" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-success">
                    <span class="fas fw fa-stop"></span> Selesaikan Booking
                </button>
            </form>
        </div>
    </div>
</x-layout-user>