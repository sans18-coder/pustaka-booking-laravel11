<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user }}</x-slot:user>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
            <div class="x_panel" align="center">
                <div class="x_content">
                    <div class="row">
                            <div style="height: auto; position: relative; left: 0%; width: 100%; ">
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/' . $buku->image) }}" style="max-width:100%; max-height: 100%; height: 250px; width: 220px">
                                        <h5 style="min-height:40px;" align="center">{{ $buku->pengarang }}</h5>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <h4 style="text-align: left;">Sinopsis</h4>
                                        <p style="text-align: left;">{{ $buku->sinopsis }}</p>
                                
                                        <div class="mt-auto mb-3" style="text-align: left;">
                                            <div style="display: flex; gap: 15px;">
                                                <form action="/temp/{{ $buku->id }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        <span class="fas fa-shopping-cart"></span> Booking
                                                    </button>
                                                </form>                                                
                                                <span class="btn btn-outline-secondary" onclick="window.history.back()"><span class="fas fa-reply"></span> Kembali</span>
                                            </div>
                                        </div>                                                                               
                                    </div>
                                </div>
                                                                                    
                                <div class="caption">
                                    <center>
                                        <table class="table table-striped">
                                            <tr>
                                                <th nowrap>Judul Buku: </th>
                                                <td nowrap>{{ $buku->judul_buku }}</td>
                                                <td>&nbsp;</td>
                                                <th>Kategori: </th>
                                                <td>{{ $buku->kategori->kategori }}</td>
                                            </tr>
                                            <tr>
                                                <th nowrap>Penerbit: </th>
                                                <td>{{ $buku->penerbit }}</td>
                                                <td>&nbsp;</td>
                                                <th>Dipinjam: </th>
                                                <td>{{ $buku->dipinjam }}</td>
                                            </tr>
                                            <tr>
                                                <th nowrap>Tahun Terbit: </th>
                                                <td>{{ substr($buku->tahun_terbit, 0, 4) }}</td>
                                                <td>&nbsp;</td>
                                                <th>Dibooking: </th>
                                                <td>{{ $buku->dibooking }}</td>
                                            </tr>
                                            <tr>
                                                <th>ISBN: </th>
                                                <td>{{ $buku->isbn }}</td>
                                                <td>&nbsp;</td>
                                                <th>Tersedia: </th>
                                                <td>{{ $buku->stok }}</td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-user>