<p class="text-right">
	<a href="{{ asset('security/shift-selesai') }}" class="btn btn-outline-info btn-sm">
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

<form action="{{ asset('security/shift-selesai/proses-tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row">

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label mb-3">Nama Security 1</label>
            <input type="text" name="nama_security_1" class="form-control shadow-none" value="{{ old('nama_security_1') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Selesai</label>
            <input type="time" name="jam_selesai_1" class="form-control shadow-none" value="{{ old('jam_kehadiran_1') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Nama Security 2</label>
            <input type="text" name="nama_security_2" class="form-control shadow-none" value="{{ old('nama_security_2') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Selesai</label>
            <input type="time" name="jam_selesai_2" class="form-control shadow-none" value="{{ old('jam_kehadiran_2') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label mb-3">Nama Security 3 (Optional)</label>
            <input type="text" name="nama_security_3" class="form-control shadow-none" value="{{ old('nama_security_3') }}">
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Selesai (Optional)</label>
            <input type="time" name="jam_selesai_3" class="form-control shadow-none" value="{{ old('jam_kehadiran_3') }}">
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Mematikan Lampu</label>
            <select name="lampu" class="form-control" required>
				<option value="" disabled selected>Keterangan</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
            </select>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Membuka kunci</label>
            <select name="membuka_kunci" class="form-control" required>
				<option value="" disabled selected>Keterangan</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
            </select>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Mengunci Pintu</label>
            <select name="mengunci_pintu" class="form-control" required>
				<option value="" disabled selected>Keterangan</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
            </select>
        </div>

        <div class="col-md-12 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Uraian Kegiatan</label>
            <textarea class="editor" name="uraian_kegiatan" required>{{ old('uraian_kegiatan') }}</textarea>
        </div>

        <div class="col-md-12 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Catatan Shift Selanjutnya</label>
            <textarea class="editor" name="catatan_shift_selanjutnya" required>{{ old('catatan_shift_selanjutnya') }}</textarea>
        </div>
 
        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Tanggal Shift</label>
            @php
    $now = \Carbon\Carbon::now();
    // Default: pakai tanggal hari ini
    $tanggal_shift = $now->format('d-m-Y');
    // Jika sekarang dini hari (jam < 6) dan shift malam, tampilkan kemarin
    if ($now->format('H') < 6) {
        $tanggal_shift = $now->copy()->subDay()->format('d-m-Y');
    }
@endphp

<input type="text" class="form-control" value="{{ $tanggal_shift }}" disabled>
{{-- Tidak perlu name="tanggal_shift" karena tanggal ditentukan di controller --}}

        </div>

		<div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Waktu Shift</label>
            <select name="shift" class="form-control" required>
				<option value="" disabled selected>Pilih Waktu Shift</option>
                            <option value="Pagi">Pagi</option>
                            <option value="Siang">Siang</option>
							<option value="Malam">Malam</option>
            </select>
        </div>

        <div class="col-md-12 ps-0 mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control shadow-none" required>
        </div>

        <div class="col-md-12 mt-3">
            <div class="text-end">
                <button class="btn btn-success" type="submit" name="submit" value="submit">
                    <i class="fa fa-save"></i> Simpan Data Shift
                </button>
                <input type="reset" name="reset" class="btn btn-danger" value="Reset">
            </div>
        </div>
    </div>
</form>
