<table>
    <thead>
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Mata Pelajaran</th>
    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $row)
        <tr>
            <td>{{ $loop->iteration + 1 }}</td>
            <td>{{ $row->nip }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->phone ?? '-' }}</td>
            <td>{{ $row->address ?? '-' }}</td>
            <td>{{ $row->date_of_birth ? \Carbon\Carbon::parse($row->date_of_birth)->format('d/m/Y') : '-' }}</td>
            <td>{{ $row->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $row->mapel ?? '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
