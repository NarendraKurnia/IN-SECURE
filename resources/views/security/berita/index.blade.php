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
        <form action="{{ url('security/berita') }}" method="get">
        <div class="input-group">
            <input type="text" name="keywords" class="form-control" placeholder="Cari berita..." value="{{ request('keywords') }}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">
                    <i class="fa fa-search"></i> Cari
                </button>
                <a href="{{ url('security/berita/tambah') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </span>
        </div>
    </form>
    </div>
    
    <div class="col-md-6">
    {{ $berita->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>

<hr>

<div class="table-responsive mailbox-messages mt-1">        
<table class="table table-sm table-hover" id="example2">
    <thead>
        <tr class="text-left bg-light">
            <th width="5%" class="text-center">NO</th>
            <th width="10%">Gambar</th>
            <th width="20%">Judul</th>
            <th width="25%">Isi</th>
            <th width="15%">Unit</th>
            <th width="10%">Update</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
    @php $no = ($berita->currentPage() - 1) * $berita->perPage() + 1; @endphp
        @foreach($berita as $item)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td class="text-center">
                @if($item->gambar)
                    <img src="{{ asset('admin/upload/berita/'.$item->gambar) }}" class="img img-fluid img-thumbnail" alt="Gambar {{ $item->judul }}" style="max-width: 100px;">
                @else
                    <span class="badge badge-warning">Tidak ada</span>
                @endif
            </td>
            <td>{{ $item->judul }}</td>
            <td>{{ Str::limit($item->isi, 1000) }}</td> {{-- Isi berita dipotong jika terlalu panjang --}}
            <td>{{ $item->unit ? $item->unit->nama : 'Tidak ada unit' }}</td>
            <td>{{ $item->tanggal_update ?? '-' }}</td> {{-- Gunakan tanda '-' jika null --}}
            <td>
                <div class="btn-group">
                    <a href="{{ url('security/berita/edit/'.$item->id_berita) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target={{"#exampleModal" . $item->id_berita}}>
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id={{"exampleModal" . $item->id_berita}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('berita.delete', $item->id_berita) }}" method="POST">
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



