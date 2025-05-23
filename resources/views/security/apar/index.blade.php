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
        <form action="{{ url('security/pemeriksaan-apar') }}" method="get">
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Cari pemeriksaan..." value="{{ request('keywords') }}">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">
                        <i class="fa fa-search"></i> Cari
                    </button>
                    <a href="{{ url('security/apar/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru
                    </a>
                </span>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        {{ $pemeriksaan->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>

<hr>

<div class="table-responsive mailbox-messages mt-1">
    <table class="table table-sm table-hover" id="example2">
        <thead>
            <tr class="text-left bg-light">
                <th width="10%" class="text-center">NO</th>
                <th width="25%">Tanggal Pemeriksaan</th>
                <th width="25%">NO Apar</th>
                <th width="20%">Update</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = ($pemeriksaan->currentPage() - 1) * $pemeriksaan->perPage() + 1; @endphp
            @foreach($pemeriksaan as $item)
                <tr>
                    <td class="text-center">{{ $no }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                    <td>
                        @foreach ($item->detail_apar as $detail)
                            {{ $detail->apar->kode }} ({{ $detail->apar->lokasi }})<br>
                        @endforeach
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailModal{{ $item->id_pemeriksaan }}">
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $item->id_pemeriksaan }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <a href="{{ route('apar.cetak', $item->id_pemeriksaan) }}" target="_blank" class="btn btn-success btn-sm">
                            <i class="fa fa-print"></i>
                        </a>
                        </div>
                
                        <!-- Modal Detail -->
       <!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $item->id_pemeriksaan }}" tabindex="-1" aria-labelledby="detailLabel{{ $item->id_pemeriksaan }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pemeriksaan APAR #{{ $item->id_pemeriksaan }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label mb-3">Nama Petugas</label>
                        <input type="text" class="form-control shadow-none" value="{{ $item->nama_petugas }}" readonly>
                    </div>

                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label mb-3">Jam Pemeriksaan</label>
                        <input type="time" class="form-control shadow-none" value="{{ $item->jam_pemeriksaan }}" readonly>
                    </div>

                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label mb-3">Tanggal Pemeriksaan</label>
                        <input type="date" class="form-control shadow-none" value="{{ $item->tanggal_update }}" readonly>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Nomor APAR</label>
                            @php
                            $apar = \App\Models\Apar_Model::find($detail->id_apar);
                        @endphp
                        <input type="text" class="form-control shadow-none" value="{{ $apar->kode }} ({{ $apar->lokasi }})" readonly>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Masa Berlaku</label>
                            <input type="date" class="form-control shadow-none" value="{{ $detail->masa_berlaku }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Foto</label>
                                @foreach($pemeriksaan as $item)
    @if($item->details->isNotEmpty() && $item->details->first()->foto)
        <img src="{{ asset('admin/upload/apar/' . $item->details->first()->foto) }}" alt="Foto" class="img-fluid mb-3" style="max-height: 200px;"/>
    @else
        <p>Tidak ada foto.</p>
    @endif
@endforeach



                            </div>
                @php
                    $detailItems = (new \App\Models\PemeriksaanAparDetail_Model())->listingByPemeriksaan($item->id_pemeriksaan);
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
                <div class="border rounded p-3 mb-3">

                    <label class="form-label fw-bold">List Check</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 50%;">Item Check</th>
                                <th style="width: 25%; text-align: center;">Bagus</th>
                                <th style="width: 25%; text-align: center;">Rusak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checkItems as $field => $label)
                            <tr>
                                <td>{{ $label }}</td>
                                <td class="text-center">
                                    <input type="radio" disabled {{ $detail->$field === 'bagus' ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="radio" disabled {{ $detail->$field === 'rusak' ? 'checked' : '' }}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>



                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deleteModal{{ $item->id_pemeriksaan }}" tabindex="-1" aria-labelledby="deleteLabel{{ $item->id_pemeriksaan }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('pemeriksaan-apar.delete', $item->id_pemeriksaan) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
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
