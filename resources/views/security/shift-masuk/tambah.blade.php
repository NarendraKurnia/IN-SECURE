<p class="text-right">
	<a href="{{ asset('security/shift-masuk') }}" class="btn btn-outline-info btn-sm">
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

<form action="{{ asset('security/shift-masuk/proses-tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row">

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label mb-3">Nama Security 1</label>
            <input type="text" name="nama_security_1" class="form-control shadow-none" value="{{ old('nama_security_1') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Kehadiran</label>
            <input type="time" name="jam_kehadiran_1" class="form-control shadow-none" value="{{ old('jam_kehadiran_1') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Nama Security 2</label>
            <input type="text" name="nama_security_2" class="form-control shadow-none" value="{{ old('nama_security_2') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Kehadiran</label>
            <input type="time" name="jam_kehadiran_2" class="form-control shadow-none" value="{{ old('jam_kehadiran_2') }}" required>
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label mb-3">Nama Security 3 (Optional)</label>
            <input type="text" name="nama_security_3" class="form-control shadow-none" value="{{ old('nama_security_3') }}">
        </div>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label p-0 mb-3">Jam Kehadiran (Optional)</label>
            <input type="time" name="jam_kehadiran_3" class="form-control shadow-none" value="{{ old('jam_kehadiran_3') }}">
        </div>

        <div class="col-md-6 ps-0 mb-3">
    <label class="form-label p-0 mb-3">Tanggal Shift</label>
    @php
        $today = \Carbon\Carbon::now()->format('d-m-Y');
    @endphp
    {{-- Jangan pakai name agar tidak dikirim --}}
    <input type="text" class="form-control" value="{{ $today }}" disabled>
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

        <div class="col-md-12 p-0 mb-3">
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
