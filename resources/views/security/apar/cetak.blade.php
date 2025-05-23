<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pemeriksaan APAR</title>
<!-- Icon web -->
  <link rel="icon" href="{{asset('admin/dist/img/Logo_PLN.png') }}">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        td { border: 1px solid #000; padding: 8px; vertical-align: top; }
        .label { font-weight: bold; width: 30%; background-color: #f5f5f5; }
        .foto-img {
            max-height: 200px;
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>

    <div class="title">Detail Pemeriksaan</div>

    <table>
        <tr>
            <td class="label">Nama Petugas</td>
            <td>{{ $pemeriksaan->nama_petugas }}</td>
        </tr>
        <tr>
            <td class="label">Jam Pemeriksaan</td>
            <td>{{ $pemeriksaan->jam_pemeriksaan }}</td>
        </tr>
        <tr>
    <td class="label">APAR</td>
    <td>
        @php
            $apar = \App\Models\Apar_Model::find($detail->id_apar);
        @endphp
        @if($apar)
            <input type="text" class="form-control shadow-none" 
                   value="{{ $apar->kode }} ({{ $apar->lokasi }})" readonly>
        @else
            <p>Data APAR tidak ditemukan.</p>
        @endif
    </td>
</tr>

            <td class="label">Tanggal Pemeriksaan</td>
            <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_update)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Masa Berlaku</td>
            <td>{{ \Carbon\Carbon::parse($pemeriksaan->masa_berlaku)->format('d-m-Y') }}</td>
        </tr>
        <tr>
       <tr>
    <td class="label">Foto</td>
    <td>
        @foreach($pemeriksaan->details as $detail)
            @if($detail->foto)
                <img src="{{ asset('admin/upload/apar/' . $detail->foto) }}" 
                     alt="Foto" style="max-height: 200px;">
            @else
                <p>Tidak ada foto.</p>
            @endif
        @endforeach
    </td>
</tr>

    </table>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
