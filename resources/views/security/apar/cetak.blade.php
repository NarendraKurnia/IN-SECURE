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
        @php $detail = $pemeriksaan->details->first(); @endphp
@if($detail)
    <tr>
        <td class="label">APAR</td>
        <td>
            @php
                $apar = \App\Models\Apar_Model::find($detail->id_apar);
            @endphp
            @if($apar)
                 
                       {{ $apar->kode }} {{ $apar->lokasi }} 
            @else
                <p>Data APAR tidak ditemukan.</p>
            @endif
        </td>
    </tr>
@endif

        <tr>
            <td class="label">Tanggal Pemeriksaan</td>
            <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Masa Berlaku</td>
            <td>{{ \Carbon\Carbon::parse($detail->masa_berlaku)->format('d-m-Y') }}</td>
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
<tr>
    <td class="label">List Check</td>
    <td>
        @php
            $detailItems = (new \App\Models\PemeriksaanAparDetail_Model())->listingByPemeriksaan($pemeriksaan->id_pemeriksaan);
            $checkItems = [
                'presure_gauge' => 'Presure Gauge',
                'pin_segel'     => 'Pin / Segel',
                'selang'        => 'Selang',
                'klem_selang'   => 'Klem Selang',
                'handle'        => 'Handle',
                'kondisi_fisik' => 'Kondisi Fisik'
            ];
        @endphp

        @foreach($detailItems as $detail)
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                <thead>
                    <tr>
                        <th style="width: 50%; border: 1px solid #000; padding: 5px;">Item Check</th>
                        <th style="width: 25%; border: 1px solid #000; text-align: center; padding: 5px;">Bagus</th>
                        <th style="width: 25%; border: 1px solid #000; text-align: center; padding: 5px;">Rusak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkItems as $field => $label)
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">{{ $label }}</td>
                        <td style="border: 1px solid #000; text-align: center; padding: 5px;">
                            <input type="radio" disabled {{ $detail->$field === 'bagus' ? 'checked' : '' }}>
                        </td>
                        <td style="border: 1px solid #000; text-align: center; padding: 5px;">
                            <input type="radio" disabled {{ $detail->$field === 'rusak' ? 'checked' : '' }}>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </td>
</tr>
    </table>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
