@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp

<div class="container py-4">
    <h2 class="mb-4 text-center">Dashboard Security</h2>

    {{-- Petugas Shift Hari Ini --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-people-fill"></i> Petugas Shift Hari Ini</h5>
        </div>
        <div class="card-body" style="font-size: 1.3rem;">
            @forelse ($petugas_shift as $item)
                <div class="mb-3">
                    <strong class="text-uppercase">{{ $item->shift }}</strong> 
                    (<span class="text-muted">{{ Carbon::parse($item->tanggal_shift)->translatedFormat('d F Y') }}</span>):<br>
                    <span class="badge fs-5 me-2">{{ $item->nama_security_1 ?? '-' }}</span>
                    <span class="badge fs-5 me-2">{{ $item->nama_security_2 ?? '-' }}</span>
                    <span class="badge fs-5">{{ $item->nama_security_3 ?? '-' }}</span>
                </div>
            @empty
                <p class="text-muted">Tidak ada data shift hari ini.</p>
            @endforelse
        </div>

    </div>

    {{-- Statistik Shift Hari Ini --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-door-open-fill"></i> Shift Masuk Hari Ini</h5>
                    <h3 class="card-text">{{ $total_shift_masuk }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-danger mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-door-closed-fill"></i> Shift Selesai Hari Ini</h5>
                    <h3 class="card-text">{{ $total_shift_selesai }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Catatan Shift Terakhir --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0"><i class="bi bi-journal-text"></i> Catatan Shift Terakhir</h5>
        </div>
        <div class="card-body">
            <p>{!! $catatan_terakhir ?? '<em>Tidak ada catatan shift sebelumnya</em>' !!}</p>
        </div>
    </div>

    {{-- Rekap Shift Security --}}
    <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0"><i class="bi bi-clipboard-data-fill"></i> Rekap Shift Security (30 Hari Terakhir)</h5>
    </div>
    <div class="card-body">
        @if ($rekap_security->count())
            <ul class="list-group">
                @foreach ($rekap_security as $nama => $jumlah_shift)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">{{ $nama }}</div>
                            <div class="text-center" style="width: 100px;">
                                <span class="badge bg-primary rounded-pill">{{ $jumlah_shift }} shift</span>
                            </div>
                            <div class="ms-2">
                                <a href="{{ route('dashboard.cetak', $nama) }}" target="_blank" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Tidak ada data shift bulan ini.</p>
        @endif
    </div>
</div>

</div>
