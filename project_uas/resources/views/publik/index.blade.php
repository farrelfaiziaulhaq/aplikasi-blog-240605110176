@extends('publik.layout')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4 class="fw-bold mb-4">Artikel Terbaru</h4>

            @forelse($artikel as $item)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="img-fluid rounded"
                                    alt="{{ $item->judul }}" style="height: 150px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <span class="badge bg-secondary mb-2">{{ $item->kategori->nama_kategori }}</span>
                                <h5 class="fw-bold">
                                    <a href="{{ route('artikel.baca', $item->id) }}"
                                        class="text-dark text-decoration-none">{{ $item->judul }}</a>
                                </h5>
                                <p class="text-muted small mb-2">
                                    Oleh: <strong>{{ $item->penulis->nama_depan }}
                                        {{ $item->penulis->nama_belakang }}</strong> | {{ $item->hari_tanggal }}
                                </p>
                                <p class="card-text">{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                                <a href="{{ route('artikel.baca', $item->id) }}" class="btn btn-sm btn-primary">Baca
                                    Selengkapnya &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Belum ada artikel yang diterbitkan.</div>
            @endforelse
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Kategori Artikel</div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('home') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Semua Kategori
                        </a>
                        @foreach ($kategori as $kat)
                            <a href="{{ route('home', ['kategori' => $kat->id]) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('kategori') == $kat->id ? 'active' : '' }}">
                                {{ $kat->nama_kategori }}
                                <span class="badge bg-primary rounded-pill">{{ $kat->artikel_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
