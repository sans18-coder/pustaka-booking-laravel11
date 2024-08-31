<table id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun terbit</th>
            <th>ISBN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $index => $b)
        <tr>
            <th>{{ $index + 1 }}</th>
            <td>{{ $b->judul_buku }}</td>
            <td>{{ $b->kategori->kategori }}</td>
            <td>{{ $b->pengarang }}</td>
            <td>{{ $b->penerbit }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>{{ $b->isbn }}</td>
        </tr>
        @endforeach
    </tbody>
</table>