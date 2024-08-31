<table id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Alamat</th>
            <th>Tanggal Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $anggota as $index => $a)    
            <tr>
                <th>{{ $index + 1 }}</th>
                <td nowrap>{{ $a->nama }}</td>
                <td nowrap>{{ $a->email }}</td>
                <td>{{ $a->alamat }}</td>
                <td nowrap>{{ $a->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>