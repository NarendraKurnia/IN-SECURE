<!DOCTYPE html>
<html>
<head>
    <title>Cetak Rekap Shift</title>
    <!-- Icon web -->
  <link rel="icon" href="{{asset('admin/dist/img/Logo_PLN.png') }}">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h3>Rekap Shift Security: {{ $nama_security }}</h3>
    <p>Periode: {{ \Carbon\Carbon::now()->subDays(30)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal Shift</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shiftMasuk as $masuk)
                @php
                    $selesai = $shiftSelesai->firstWhere('tanggal_shift', $masuk->tanggal_shift);
                @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::parse($masuk->tanggal_shift)->format('d-m-Y') }}</td>
                    <td>{{ $masuk->jam_kehadiran_1 }}</td>
                    <td>{{ $selesai?->jam_selesai_1 ?? '-' }}</td>
                    <td>{{ $masuk->shift }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script> window.print(); </script>
</body>
</html>
