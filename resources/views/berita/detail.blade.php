@include('layout.head')
@include('layout.header')

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <!-- Kolom utama (konten berita) -->
        <div class="col-md-9">
            <h2 style="margin-top: 10px;">{{ $berita->judul }}</h2>
            <div class="d-flex justify-content-between align-items-center" style="font-size: 1em;">
                <h5 class="mb-0">{{ \Carbon\Carbon::parse($berita->tanggal_update)->translatedFormat('d F Y') }}</h5>
                <div class="d-flex align-items-center">
                    <i class="bi bi-eye me-1"></i>
                    <span>{{ $berita->views }}</span>
                </div>
            </div>
            <hr>
            <div class="berita-up3sbb">
                <img src="{{ asset('admin/upload/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="profil-img">
            </div>
            <div class="row col-md-12 isi-buletin mt-3">
                <h4 style="font-size: 1.1em;">{!! $berita->isi !!}</h4>
            </div>
            <a class="nav-link-active lihat-detailbuletin mt-3" aria-current="page" href="{{ url()->previous() }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Kolom kanan (berita lainnya) -->
        <div class="col-md-3">
            <h5>Berita Lainnya</h5>
            <hr>
            @foreach($berita_terkini as $item)
                <div class="mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ asset('admin/upload/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body p-2">
                            <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal_update)->translatedFormat('d F Y') }}</small>
                            <h6 class="mt-1 mb-1" style="font-weight: bold;">
                                <a href="{{ route('berita.detail', $item->id_berita) }}">{{ Str::limit($item->judul, 50) }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
