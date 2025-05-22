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
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y H:i:s') }}</td>
                    <td>
                        @foreach ($item->detail_apar as $detail)
                            {{ $detail->apar->kode }} ({{ $detail->apar->lokasi }})<br>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailModal{{ $item->id_pemeriksaan }}">
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $item->id_pemeriksaan }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>

                        <!-- Modal Detail -->
        <div class="modal fade" id="detailModal{{ $item->id_pemeriksaan }}" tabindex="-1" aria-labelledby="detailLabel{{ $item->id_pemeriksaan }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pemeriksaan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

            <div class="modal-body">
                <div class="mb-3">
                    <strong>Nama Petugas:</strong> {{ $item->nama_petugas }}<br>
                    <strong>Jam Pemeriksaan:</strong> {{ $item->jam_pemeriksaan }}<br>
                    <strong>Tanggal Pemeriksaan:</strong> {{ \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y') }}<br>
                </div>

                <h6 class="mt-4">Detail APAR</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nomor APAR</th>
                            <th>Lokasi</th>
                            <th>Masa Berlaku</th>
                            <th>Presure Gauge</th>
                            <th>Pin / Segel</th>
                            <th>Selang</th>
                            <th>Klem Selang</th>
                            <th>Handle</th>
                            <th>Kondisi Fisik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->detail_apar as $i => $detail)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $detail->apar->kode ?? '-' }}</td>
                                <td>{{ $detail->apar->lokasi ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($detail->masa_berlaku)->format('d-m-Y') }}</td>
                                <td>{{ ucfirst($detail->presure_gauge) }}</td>
                                <td>{{ ucfirst($detail->pin_segel) }}</td>
                                <td>{{ ucfirst($detail->selang) }}</td>
                                <td>{{ ucfirst($detail->klem_selang) }}</td>
                                <td>{{ ucfirst($detail->handle) }}</td>
                                <td>{{ ucfirst($detail->kondisi_fisik) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
