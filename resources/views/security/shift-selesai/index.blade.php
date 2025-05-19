@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="{{ url('security/shift-selesai') }}" method="get">
        <div class="input-group">
            <input type="text" name="keywords" class="form-control" placeholder="Cari shift..." value="{{ request('keywords') }}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">
                    <i class="fa fa-search"></i> Cari
                </button>
                <a href="{{ url('security/shift-selesai/tambah') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </span>
        </div>
    </form>
    </div>
    
    <div class="col-md-6">
    {{ $shift_selesai->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>

<hr>

<div class="table-responsive mailbox-messages mt-1">        
<table class="table table-sm table-hover" id="example2">
    <thead>
        <tr class="text-left bg-light">
            <th width="10%" class="text-center">NO</th>
            <th width="25%">Tanggal Shift</th>
            <th width="25%">Waktu Shift</th>
            <th width="20%">Update</th>
            <th width="20%">Action</th>
        </tr>
    </thead>
    <tbody>
    @php $no = ($shift_selesai->currentPage() - 1) * $shift_selesai->perPage() + 1; @endphp
        @foreach($shift_selesai as $item)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td>
            {{ \Carbon\Carbon::parse($item->tanggal_shift, 'UTC')
                ->setTimezone('Asia/Jakarta')
                ->format('d-m-Y ') }}
            </td>

            <td>{{ $item->shift }}</td>
            <td>
            {{ \Carbon\Carbon::parse($item->tanggal_update, 'UTC')
                ->setTimezone('Asia/Jakarta')
                ->format('d-m-Y H:i:s') }}
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target={{"#exampleModal1" . $item->id_selesai}}>
                    <i class="fa fa-eye"></i>
                    @php
                        $unit_id = session('unit_id');
                    @endphp

                    @if ($unit_id != 1)
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{ '#exampleModal2' . $item->id_selesai }}"> 
                        <i class="fa fa-trash"></i>
                    </button>
                    @endif
                </button>
                <!-- cetak -->
                <a href="{{ route('shift-selesai.cetak', $item->id_selesai) }}" target="_blank" class="btn btn-success btn-sm">
                    <i class="fa fa-print"></i>
                </a>

                <!-- Modal Detail Shift -->
                    <div class="modal fade" id="{{ 'exampleModal1' . $item->id_selesai }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id_selesai }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $item->id_selesai }}">Detail Shift #{{ $item->id_selesai }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label mb-3">Nama Security 1</label>
                                <input type="text" name="nama_security_1" class="form-control shadow-none" value="{{ $item->nama_security_1 }}" readonly>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Selesai</label>
                                <input type="time" name="jam_kehadiran_1" class="form-control shadow-none" value="{{ $item->jam_selesai_1 }}" readonly>
                            </div>

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 mb-3">Nama Security 2</label>
                                <input type="text" name="nama_security_2" class="form-control shadow-none" value="{{ $item->nama_security_2 }}" readonly>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Selesai</label>
                                <input type="time" name="jam_kehadiran_2" class="form-control shadow-none" value="{{ $item->jam_selesai_2 }}" readonly>
                            </div>

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label mb-3">Nama Security 3 (Optional)</label>
                                <input type="text" name="nama_security_3" class="form-control shadow-none" value="{{ $item->nama_security_3 }}" readonly>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Selesai</label>
                                <input type="time" name="jam_kehadiran_3" class="form-control shadow-none" value="{{ $item->jam_selesai_3 }}" readonly>
                            </div>

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 mb-3">Lampu</label>
                                <input type="text" name="lampu" class="form-control shadow-none" value="{{ $item->lampu}}" readonly>
                            </div>

                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Membuka Kunci</label>
                                <input type="text" name="membuka_kunci" class="form-control shadow-none" value="{{ $item->membuka_kunci}}" readonly>
                            </div>

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 mb-3">Mengunci Pintu</label>
                                <input type="text" name="mengunci_pintu" class="form-control shadow-none" value="{{ $item->mengunci_pintu}}" readonly>
                            </div>

                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Tanggal Shift</label>
                                <input type="date" name="tanggal_shift" class="form-control shadow-none" value="{{ $item->tanggal_shift }}" readonly>
                            </div>

                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 mb-3">Waktu Shift</label>
                                <input type="text" name="shift" class="form-control shadow-none" value="{{ $item->shift}}" readonly>
                            </div>

                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Uraian Kegiatan</label>
                                <div class="border p-3 rounded bg-light" style="min-height: 100px;">
                                    {!! $item->uraian_kegiatan !!}
                                </div>
                            </div>

                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Catatan Shift Selanjutnya</label>
                                <div class="border p-3 rounded bg-light" style="min-height: 100px;">
                                    {!! $item->catatan_shift_selanjutnya !!}
                                </div>
                            </div>

                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Foto</label>
                                @if(!empty($item->foto))
                                <img src="{{ asset('admin/upload/shift-selesai/' . $item->foto) }}" alt="Foto Shift" class="img-fluid mb-3" style="max-height: 200px;">
                                @else
                                <p>Tidak ada foto.</p>
                                @endif
                            </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>


                <!-- Modal 2-->
                <div class="modal fade" id={{"exampleModal2" . $item->id_selesai}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Yang di Hapus Tidak Dapat Dikembalikan!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{ route('shift-selesai.delete', $item->id_selesai) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                        </form>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
        @php $no++; @endphp
        @endforeach
    </tbody>
</table>
</div>



