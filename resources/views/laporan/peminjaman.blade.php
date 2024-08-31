<table id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Pinjam</th>
            <th>Nama</th>
            <th>Nomor Booking</th>
            <th nowrap>Tanggal Pinjam</th>
            <th nowrap>Batas Pengembalian</th>
            <th nowrap>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $peminjaman as $index => $p)    
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->id }}</td>
                <td nowrap>{{ $p->booking->user->nama }}</td>
                <td>{{ $p->id_booking }}</td>
                <td>{{ $p->tgl_pinjam }}</td>
                <td>{{ $p->tgl_kembali }}</td>
                <td>{{ $p->tgl_Pengembalian }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->detail->sum('denda') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</table>