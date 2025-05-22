<p class="text-right">
  <a href="{{ asset('security/apar') }}" class="btn btn-outline-info btn-sm">
    <i class="fa fa-arrow-left"></i> Kembali
  </a>
</p>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ url('security/apar/proses-tambah') }}" method="POST" accept-charset="utf-8">
  @csrf

  <div class="row">

    <div class="col-md-6 ps-0 mb-3">
      <label class="form-label mb-3">Nama Petugas</label>
      <input type="text" name="nama_petugas" class="form-control shadow-none" value="{{ old('nama_petugas') }}" required>
    </div>

    <div class="col-md-6 p-0 mb-3">
      <label class="form-label p-0 mb-3">Jam Pemeriksaan</label>
      <input type="time" name="jam_pemeriksaan" class="form-control shadow-none" value="{{ old('jam_pemeriksaan') }}" required>
    </div>

    <div class="col-md-6 ps-0 mb-3">
      <label class="form-label p-0 mb-3">Tanggal Pemeriksaan</label>
      <input type="date" name="tanggal_update" class="form-control shadow-none" value="{{ old('tanggal_update') }}" required>
    </div>

    <div class="col-md-6 p-0 mb-3">
      <label class="form-label mb-3">Nomor APAR</label>
      <select class="form-control shadow-none custom-select-icon" required name="id_apar[]">
        <option value="" disabled selected>Pilih NO APAR</option>
        @foreach ($apars as $apar)
          <option value="{{ $apar->id_apar }}">
            {{ $apar->kode }} ({{ $apar->lokasi }})
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-md-6 ps-0 mb-3">
      <label class="form-label">Masa Berlaku</label>
      <input type="date" name="masa_berlaku[]" class="form-control shadow-none" value="{{ old('masa_berlaku.0') }}" required>
    </div>

    <div class="col-md-12 mt-4">
      <label class="form-label" style="font-weight: bold;">List Check</label>
      <table class="table">
        <thead>
          <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%; text-align: center;">Bagus</th>
            <th style="width: 25%; text-align: center;">Rusak</th>
          </tr>
        </thead>
        <tbody>
          @php
            $items = [
              'presure_gauge' => 'Presure Gauge',
              'pin_segel'     => 'Pin / Segel',
              'selang'        => 'Selang',
              'klem_selang'   => 'Klem Selang',
              'handle'        => 'Handle',
              'kondisi_fisik' => 'Kondisi Fisik'
            ];
          @endphp
          @foreach($items as $name => $label)
            <tr>
              <td>{{ $label }}</td>
              <td class="text-center">
                <input class="form-check-input" type="radio" name="{{ $name }}[]" value="bagus" required>
              </td>
              <td class="text-center">
                <input class="form-check-input" type="radio" name="{{ $name }}[]" value="rusak" required>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-12 mt-3">
      <div class="text-end">
        <button class="btn btn-success" type="submit" name="submit" value="submit">
          <i class="fa fa-save"></i> Simpan Pemeriksaan
        </button>
        <input type="reset" name="reset" class="btn btn-danger" value="Reset">
      </div>
    </div>

  </div>
</form>
