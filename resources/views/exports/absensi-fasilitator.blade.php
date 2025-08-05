<table>
    <thead>
        <tr>
            <th>Sekolah</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Status Verifikasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $absen)
            <tr>
                <td>{{ $absen->absensi->jadwal->sekolah->nama ?? '-' }}</td>
                <td>{{ $absen->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $absen->status }}</td>
                <td>{{ $absen->status_verifikasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
